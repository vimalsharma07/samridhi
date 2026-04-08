<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'title', 'slug', 'short_description', 'tagline', 'description', 'featured_image',
        'images', 'applications', 'faqs', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'applications' => 'array',
        'images' => 'array',
        'faqs' => 'array',
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

    /** @return string Textarea value for admin: one FAQ per line as question|answer */
    public function faqsAsFormText(): string
    {
        $raw = $this->faqs;
        if (! is_array($raw) || count($raw) === 0) {
            return '';
        }
        $lines = [];
        foreach ($raw as $row) {
            if (! is_array($row)) {
                continue;
            }
            $q = trim((string) ($row['q'] ?? $row['question'] ?? ''));
            $a = trim((string) ($row['a'] ?? $row['answer'] ?? ''));
            if ($q !== '' && $a !== '') {
                $lines[] = $q.'|'.$a;
            }
        }

        return implode("\n", $lines);
    }

    /**
     * FAQs for the product detail page: saved entries, or sensible defaults.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function faqsForDisplay(): array
    {
        $raw = $this->faqs;
        if (is_array($raw) && count($raw) > 0) {
            $out = [];
            foreach ($raw as $row) {
                if (! is_array($row)) {
                    continue;
                }
                $q = trim((string) ($row['q'] ?? $row['question'] ?? ''));
                $a = trim((string) ($row['a'] ?? $row['answer'] ?? ''));
                if ($q !== '' && $a !== '') {
                    $out[] = ['q' => $q, 'a' => $a];
                }
            }
            if (count($out) > 0) {
                return $out;
            }
        }

        $name = $this->title;

        return [
            [
                'q' => "What is {$name} typically used for?",
                'a' => 'Our products are chosen for structural, mechanical, agricultural, infrastructure and general engineering applications where strength, consistency and long service life matter.',
            ],
            [
                'q' => 'Do you supply test certificates?',
                'a' => 'Yes. We maintain quality records and can supply material test certificates as per order requirements and applicable standards.',
            ],
            [
                'q' => 'How can I get a quotation or technical specifications?',
                'a' => 'Use Enquire Now on this page or contact our team with sizes, quantities, standards required and delivery location—we will respond promptly.',
            ],
            [
                'q' => 'Are products available across India?',
                'a' => 'Samridhi serves customers through a wide network of distributors and dealers. Contact us to find supply options in your region.',
            ],
        ];
    }
}
