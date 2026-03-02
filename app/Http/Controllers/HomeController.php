<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\WebsiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $latestBlogs = Blog::published()->latest('published_at')->take(3)->get();
        return view('home.index', compact('latestBlogs'));
    }

    public function about()
    {
        return view('about.index');
    }

    public function products()
    {
        $products = Product::active()->ordered()->get();
        return view('products.index', compact('products'));
    }

    public function productShow(string $slug)
    {
        $product = Product::active()->where('slug', $slug)->firstOrFail();
        $relatedBlogs = Blog::published()
            ->where('product_id', $product->id)
            ->latest('published_at')
            ->take(3)
            ->get();
        $title = $product->title . ' | Samridhi - Steel Pipes & Tubes';
        $metaDescription = \Illuminate\Support\Str::limit($product->short_description ?? $product->title, 160);
        return view('products.show', compact('product', 'relatedBlogs', 'title', 'metaDescription'));
    }

    public function quality()
    {
        return view('quality.index');
    }

    public function investors()
    {
        return view('investors.index');
    }

    public function clients()
    {
        return view('clients.index');
    }

    public function careers()
    {
        return view('careers.index');
    }

    public function blog()
    {
        $blogs = Blog::published()->latest('published_at')->paginate(9);
        return view('blog.index', compact('blogs'));
    }

    public function blogShow(string $slug)
    {
        $blog = Blog::published()->where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('blog'));
    }

    public function contact($page = 'us')
    {
        return view('contact.index', compact('page'));
    }
}
