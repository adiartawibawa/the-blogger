<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Technology extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'icon_type',
        'color',
        'category',
        'proficiency',
        'is_featured',
        'sort_order',
    ];

    public function casts()
    {
        return [
            'is_featured' => 'boolean',
            'proficiency' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_technology');
    }

    public function getIconUrlAttribute(): ?string
    {
        if (!$this->icon) return null;
        if ($this->icon_type === 'image') {
            return asset('storage/' . $this->icon);
        }
        return $this->icon;
    }

    public static function categories(): array
    {
        return [
            'language' => 'Programming Language',
            'framework' => 'Framework / Library',
            'database' => 'Database',
            'devops' => 'DevOps / Infrastructure',
            'tool' => 'Tool / Software',
            'other' => 'Other',
        ];
    }
}
