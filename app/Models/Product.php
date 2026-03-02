<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'title', 'slug', 'short_description', 'tagline', 'description', 'featured_image',
        'images', 'applications', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'applications' => 'array',
        'images' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('title') && !$product->isDirty('slug')) {
                $product->slug = Str::slug($product->title);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    public function relatedBlogs()
    {
        return $this->hasMany(Blog::class, 'product_id');
    }
}
