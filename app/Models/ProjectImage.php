<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectImage extends Model
{
    use HasUuids;

    protected $fillable = [
        'project_id',
        'path',
        'alt',
        'caption',
        'sort_order',
    ];

    public function casts()
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->path);
    }

    protected static function booted(): void
    {
        static::creating(function (ProjectImage $image) {
            if (is_null($image->sort_order)) {
                $image->sort_order = 0;
            }
        });
    }
}
