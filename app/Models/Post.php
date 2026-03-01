<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasUuids;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'cover_image',
        'content_format',
        'status',
        'published_at',
        'views',
        'read_time',
        'meta_title',
        'meta_description',
        'og_image',
        'is_featured',
    ];

    public function casts()
    {
        return [
            'published_at' => 'datetime',
            'views' => 'integer',
            'read_time' => 'integer',
            'is_featured' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Post $post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
            // Calculate read time
            $wordCount = str_word_count(strip_tags($post->content));
            $post->read_time = max(1, (int) ceil($wordCount / 200));

            // Auto-generate excerpt if empty
            if (empty($post->excerpt)) {
                $post->excerpt = Str::limit(strip_tags($post->content), 200);
            }
        });

        static::updating(function (Post $post) {
            if ($post->isDirty('content')) {
                $wordCount = str_word_count(strip_tags($post->content));
                $post->read_time = max(1, (int) ceil($wordCount / 200));
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getCoverImageUrlAttribute(): ?string
    {
        if (!$this->cover_image) return null;
        return asset('storage/' . $this->cover_image);
    }

    public function getOgImageUrlAttribute(): ?string
    {
        $image = $this->og_image ?? $this->cover_image;
        if (!$image) return null;
        return asset('storage/' . $image);
    }

    public function incrementViews(): void
    {
        $this->increment('views');
    }

    public function getRelatedPosts(int $limit = 3)
    {
        return static::published()
            ->where('id', '!=', $this->id)
            ->where(function ($query) {
                $query->where('category_id', $this->category_id)
                    ->orWhereHas('tags', function ($q) {
                        $q->whereIn('tags.id', $this->tags->pluck('id'));
                    });
            })
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }

    public function generateTableOfContents(): array
    {
        $toc = [];
        preg_match_all('/<h([2-3])[^>]*>(.*?)<\/h\1>/is', $this->getRenderedContent(), $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $level = (int) $match[1];
            $text = strip_tags($match[2]);
            $id = Str::slug($text);
            $toc[] = [
                'level' => $level,
                'text' => $text,
                'id' => $id,
            ];
        }

        return $toc;
    }

    public function getRenderedContent(): string
    {
        if ($this->content_format === 'markdown') {
            $converter = new \League\CommonMark\CommonMarkConverter([
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ]);
            return $converter->convert($this->content)->getContent();
        }
        return $this->content;
    }
}
