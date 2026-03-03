<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('experiences.experiences', [
            [
                'role' => 'Vocational Educator (Network Engineering)',
                'company' => 'Vocational High School (SMKN 3 Tabanan)',
                'period' => '2019 — Present',
                'description' => 'Educating and training future tech talents in network infrastructure competencies, server administration, and cybersecurity based on current industry standards.',
                'technologies' => ['MikroTik', 'Cisco CCNA', 'Linux Administration', 'Network Security', 'Virtualization'],
            ],
            [
                'role' => 'Full Stack Web Developer (Freelance)',
                'company' => 'Self-Employed',
                'period' => '2013 — Present',
                'description' => 'Delivering end-to-end digital solutions for diverse clients, ranging from developing scalable web architectures to optimizing complex database management systems.',
                'technologies' => ['Laravel', 'Vue.js', 'RESTful API', 'MySQL', 'Cloud Hosting'],
            ],
            [
                'role' => 'IT Consultant (Geographic Information System)',
                'company' => 'Department of Public Works and Spatial Planning (PUPR)',
                'period' => '2013 — 2019',
                'description' => 'Responsible for the design and implementation of spatial data infrastructure and the development of Geographic Information Systems to support regional spatial planning efficiency.',
                'technologies' => ['ArcGIS', 'QGIS', 'PostGIS', 'Web GIS', 'Spatial Analysis'],
            ],
        ]);
    }
};
