<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'featured_image',
        'is_published', 'published_at', 'user_id', 'product_id',
        'product_detail_title', 'product_detail_points'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
        });

        static::updating(function ($blog) {
            if ($blog->isDirty('title') && !$blog->isDirty('slug')) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    /** @return array<int, string> */
    public function getProductDetailPointsArrayAttribute(): array
    {
        if (empty($this->product_detail_points)) {
            return [];
        }
        $lines = preg_split('/\r\n|\r|\n/', trim($this->product_detail_points), -1, PREG_SPLIT_NO_EMPTY);
        return array_values(array_filter(array_map('trim', $lines)));
    }
}
