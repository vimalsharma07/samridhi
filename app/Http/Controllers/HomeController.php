<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\WebsiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function about($page = 'overview')
    {
        return view('about.index', compact('page'));
    }

    public function products($slug = null)
    {
        return view('products.index', compact('slug'));
    }

    public function quality($page = 'control')
    {
        return view('quality.index', compact('page'));
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
