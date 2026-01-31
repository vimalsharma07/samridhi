<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
        $blogCount = Blog::count();
        $publishedCount = Blog::published()->count();

        return view('admin.dashboard', compact('blogCount', 'publishedCount'));
    }
}
