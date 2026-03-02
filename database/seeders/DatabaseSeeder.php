<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@portfolio.dev'],
            [
                'name' => env('PORTFOLIO_OWNER_NAME', 'Admin'),
                'email' => 'admin@portfolio.dev',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Create Technologies
        $technologiesData = [
            ['name' => 'PHP', 'category' => 'language', 'color' => '#777BB4', 'proficiency' => 90, 'is_featured' => true],
            ['name' => 'JavaScript', 'category' => 'language', 'color' => '#F7DF1E', 'proficiency' => 85, 'is_featured' => true],
            ['name' => 'Laravel', 'category' => 'framework', 'color' => '#FF2D20', 'proficiency' => 92, 'is_featured' => true],
            ['name' => 'Vue.js', 'category' => 'framework', 'color' => '#4FC08D', 'proficiency' => 85, 'is_featured' => true],
            ['name' => 'Tailwind CSS', 'category' => 'framework', 'color' => '#06B6D4', 'proficiency' => 95, 'is_featured' => true],
            ['name' => 'MySQL', 'category' => 'database', 'color' => '#4479A1', 'proficiency' => 88, 'is_featured' => true],
            ['name' => 'PostgreSQL', 'category' => 'database', 'color' => '#336791', 'proficiency' => 75, 'is_featured' => false],
            ['name' => 'Docker', 'category' => 'devops', 'color' => '#2496ED', 'proficiency' => 70, 'is_featured' => true],
            ['name' => 'Git', 'category' => 'tool', 'color' => '#F05032', 'proficiency' => 90, 'is_featured' => true],
            ['name' => 'Unity', 'category' => 'Game Engine', 'color' => '#222C37', 'proficiency' => 95, 'is_featured' => true],
        ];

        $technologies = [];
        foreach ($technologiesData as $i => $data) {
            $tech = Technology::updateOrCreate(
                ['slug' => Str::slug($data['name'])],
                array_merge($data, ['sort_order' => $i])
            );
            $technologies[$data['name']] = $tech;
        }

        // Create Categories
        $categoriesData = [
            ['name' => 'Tutorial', 'color' => '#6366f1', 'description' => 'Step-by-step guides and how-tos'],
            ['name' => 'PHP & Laravel', 'color' => '#FF2D20', 'description' => 'Articles about PHP and Laravel framework'],
            ['name' => 'JavaScript', 'color' => '#F7DF1E', 'description' => 'JavaScript, Node.js, and frontend frameworks'],
            ['name' => 'DevOps', 'color' => '#2496ED', 'description' => 'Infrastructure, deployment, and CI/CD'],
            ['name' => 'Career', 'color' => '#10B981', 'description' => 'Developer career tips and insights'],
        ];

        foreach ($categoriesData as $i => $data) {
            Category::updateOrCreate(
                ['slug' => Str::slug($data['name'])],
                array_merge($data, ['sort_order' => $i])
            );
        }

        // Create Tags
        $tagsData = ['laravel', 'php', 'javascript', 'typescript', 'api', 'rest', 'database', 'mysql', 'docker', 'tailwindcss', 'vue', 'react', 'filament', 'tips', 'beginner', 'advanced'];
        foreach ($tagsData as $tagName) {
            Tag::updateOrCreate(
                ['slug' => Str::slug($tagName)],
                ['name' => ucfirst($tagName)]
            );
        }

        // Create Sample Projects
        $projectsData = [
            [
                'title' => 'E-Commerce Platform',
                'excerpt' => 'A full-featured e-commerce platform built with Laravel and Vue.js, featuring multi-vendor support, payment integration, and real-time inventory management.',
                'description' => '<h2>Overview</h2><p>A comprehensive e-commerce solution built from the ground up with modern technologies. The platform supports multiple vendors, handles complex inventory management, and integrates with popular payment gateways.</p><h2>Key Features</h2><ul><li>Multi-vendor marketplace support</li><li>Real-time inventory tracking</li><li>Stripe & PayPal payment integration</li><li>Advanced product search & filtering</li><li>Order management & tracking</li><li>Admin analytics dashboard</li></ul><h2>Technical Highlights</h2><p>Built with event-driven architecture for scalability. Uses Redis for caching and queue processing, ensuring fast response times even under heavy load.</p>',
                'role' => 'Full Stack Developer',
                'client' => 'Startup Client',
                'demo_url' => 'https://demo.example.com',
                'repo_url' => 'https://github.com/example/ecommerce',
                'status' => 'featured',
                'completed_at' => now()->subMonths(2),
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Docker', 'Tailwind CSS'],
            ],
            [
                'title' => 'Portfolio CMS',
                'excerpt' => 'A headless CMS built with Laravel and Filament for managing portfolio content with multi-language support.',
                'description' => '<h2>Overview</h2><p>A custom content management system designed specifically for developer portfolios. Features a clean admin interface powered by Filament and a powerful REST API.</p><h2>Features</h2><ul><li>Filament admin panel</li><li>RESTful API</li><li>Media management</li><li>SEO tools</li><li>Multi-language support</li></ul>',
                'role' => 'Backend Developer',
                'status' => 'published',
                'repo_url' => 'https://github.com/example/portfolio-cms',
                'completed_at' => now()->subMonths(4),
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Filament'],
            ],
            [
                'title' => 'Real-time Chat App',
                'excerpt' => 'A WebSocket-based real-time chat application with rooms, private messaging, and file sharing.',
                'description' => '<h2>Overview</h2><p>A modern real-time messaging application built with Laravel and Vue.js, utilizing WebSockets for instant communication.</p><h2>Features</h2><ul><li>Real-time messaging</li><li>Public and private rooms</li><li>File sharing</li><li>Read receipts</li><li>Online status</li></ul>',
                'role' => 'Full Stack Developer',
                'status' => 'published',
                'demo_url' => 'https://chat.example.com',
                'completed_at' => now()->subMonths(6),
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Redis'],
            ],
        ];

        foreach ($projectsData as $i => $data) {
            $techs = $data['technologies'];
            unset($data['technologies']);

            $project = Project::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                array_merge($data, ['sort_order' => $i])
            );

            $techIds = collect($techs)->map(fn($t) => $technologies[$t]?->id ?? null)->filter()->toArray();
            $project->technologies()->sync($techIds);
        }

        // Create Sample Blog Posts
        $category = Category::first();
        $tags = Tag::all();

        $postsData = [
            [
                'title' => 'Building a Modern Portfolio with Laravel and Filament',
                'excerpt' => 'A comprehensive guide to building a professional developer portfolio using Laravel 11, Filament 3, and Tailwind CSS.',
                'content' => "## Introduction\n\nBuilding a professional portfolio is one of the most important things a developer can do for their career. In this article, I'll walk you through creating a modern, feature-rich portfolio using Laravel and Filament.\n\n## Why Laravel + Filament?\n\nLaravel provides a solid foundation with its elegant syntax and comprehensive ecosystem. Filament adds a beautiful, powerful admin panel that makes managing your content a breeze.\n\n## Setting Up the Project\n\nFirst, let's create a new Laravel project:\n\n```bash\ncomposer create-project laravel/laravel portfolio\ncd portfolio\ncomposer require filament/filament\n```\n\n## Creating the Models\n\nWe'll need several models to support our portfolio features:\n\n- **Project** - For storing project information\n- **Post** - For blog articles\n- **Technology** - For tech stack management\n\n## Conclusion\n\nWith Laravel and Filament, you can build a professional portfolio that's both beautiful and easy to manage. The combination provides an excellent developer experience while delivering a polished user-facing website.",
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Mastering Eloquent Relationships in Laravel',
                'excerpt' => 'Deep dive into Laravel Eloquent ORM relationships — from basic hasMany to complex polymorphic relationships.',
                'content' => "## Overview\n\nEloquent relationships are one of Laravel's most powerful features. Understanding them deeply will make you a much more effective Laravel developer.\n\n## Basic Relationships\n\n### One to Many\n\n```php\npublic function posts(): HasMany\n{\n    return \$this->hasMany(Post::class);\n}\n```\n\n### Many to Many\n\n```php\npublic function technologies(): BelongsToMany\n{\n    return \$this->belongsToMany(Technology::class);\n}\n```\n\n## Eager Loading\n\nAlways use eager loading to avoid N+1 query problems:\n\n```php\n// Bad - N+1 problem\n\$posts = Post::all();\nforeach (\$posts as \$post) {\n    echo \$post->author->name; // Separate query for each post\n}\n\n// Good - Eager loading\n\$posts = Post::with('author')->get();\n```\n\n## Conclusion\n\nMastering Eloquent relationships will help you write cleaner, more efficient database queries.",
                'status' => 'published',
                'published_at' => now()->subDays(7),
            ],
        ];

        foreach ($postsData as $data) {
            $post = Post::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                array_merge($data, ['category_id' => $category?->id])
            );
            $post->tags()->sync($tags->take(3)->pluck('id'));
        }

        // Create default settings
        $settingsData = [
            'experiences' => json_encode([
                [
                    'role' => 'IT Consultant (Geographic Information System)',
                    'company' => 'Dinas Pekerjaan Umum dan Penataan Ruang (PUPR)',
                    'period' => '2013 — 2019',
                    'description' => 'Bertanggung jawab dalam perancangan dan implementasi infrastruktur data spasial serta pengembangan sistem informasi geografis untuk mendukung efisiensi tata ruang daerah.',
                    'technologies' => ['ArcGIS', 'QGIS', 'PostGIS', 'Web GIS', 'Spatial Analysis'],
                ],
                [
                    'role' => 'Vocational Educator (Network Engineering)',
                    'company' => 'Vocational High School (SMK)',
                    'period' => '2019 — Present',
                    'description' => 'Mendidik dan melatih talenta muda dalam kompetensi infrastruktur jaringan, administrasi server, dan keamanan siber sesuai dengan standar industri terkini.',
                    'technologies' => ['MikroTik', 'Cisco CCNA', 'Linux Administration', 'Network Security', 'Virtualization'],
                ],
                [
                    'role' => 'Senior Full Stack Web Developer (Freelance)',
                    'company' => 'Self-Employed',
                    'period' => '2013 — Present',
                    'description' => 'Menyediakan solusi digital end-to-end bagi berbagai klien, mulai dari pengembangan arsitektur web yang skalabel hingga optimalisasi sistem manajemen basis data.',
                    'technologies' => ['Laravel', 'Vue.js', 'RESTful API', 'MySQL', 'Cloud Hosting'],
                ],
            ]),
        ];

        foreach ($settingsData as $key => $value) {
            Setting::set($key, $value, 'json', 'profile');
        }

        $this->command->info('✅ Database seeded successfully!');
        $this->command->info('📧 Admin credentials: admin@portfolio.dev / password');
    }
}
