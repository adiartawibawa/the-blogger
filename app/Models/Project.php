<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'description',
        'thumbnail',
        'role',
        'demo_url',
        'repo_url',
        'client',
        'completed_at',
        'status',
        'views',
        'sort_order',
        'meta',
    ];

    public function casts()
    {
        return [
            'completed_at' => 'date',
            'meta' => 'array',
            'views' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class, 'project_technology');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        if (!$this->thumbnail) return null;
        return asset('storage/' . $this->thumbnail);
    }

    public function scopePublished($query)
    {
        return $query->whereIn('status', ['published', 'featured']);
    }

    public function scopeFeatured($query)
    {
        return $query->where('status', 'featured');
    }

    public function incrementViews(): void
    {
        $this->increment('views');
    }

    public function isPublished(): bool
    {
        return in_array($this->status, ['published', 'featured']);
    }

    public function isFeatured(): bool
    {
        return $this->status === 'featured';
    }
}
