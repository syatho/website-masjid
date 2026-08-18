<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'status',
        'featured',
        'views',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
            'views' => 'integer',
            'published_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('featured', true);
    }

    public function routeParams(): array
    {
        return [
            'year' => $this->published_at->format('Y'),
            'month' => $this->published_at->format('m'),
            'slug' => $this->slug,
        ];
    }

    /**
     * Rich-text content images are inserted via the editor without alt text.
     * Fall back to the article title so images stay accessible/indexable.
     */
    public function contentWithAccessibleImages(): string
    {
        return preg_replace_callback(
            '/<img(?![^>]*\balt=)([^>]*)>/i',
            fn (array $matches) => '<img alt="'.e($this->title).'"'.$matches[1].'>',
            $this->content ?? ''
        );
    }
}
