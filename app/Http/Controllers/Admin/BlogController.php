<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(15);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateBlog($request);

        $blog = new Blog($validated);
        $blog->user_id = auth()->id();
        $blog->slug = $this->uniqueSlug($validated['title']);
        $blog->published_at = $validated['is_published'] ? now() : null;

        if ($request->hasFile('featured_image')) {
            $blog->featured_image = $this->moveImage($request->file('featured_image'), 'blogs');
        }

        $blog->save();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        return redirect()->route('blog.show', $blog->slug);
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $this->validateBlog($request, $blog);

        $blog->fill($validated);
        $blog->slug = $this->uniqueSlug($validated['title'], $blog->id);
        $blog->published_at = $validated['is_published'] ? ($blog->published_at ?? now()) : null;

        if ($request->hasFile('featured_image')) {
            $blog->featured_image = $this->moveImage($request->file('featured_image'), 'blogs');
        }

        $blog->save();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog deleted successfully.');
    }

    protected function validateBlog(Request $request, ?Blog $blog = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'max:2048'],
            'is_published' => ['nullable'],
        ]);
        $validated['is_published'] = $request->boolean('is_published');
        return $validated;
    }

    protected function moveImage($file, string $folder): string
    {
        $dir = public_path("uploads/{$folder}");
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $name = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $path = "{$folder}/{$name}";
        $file->move($dir, $name);

        return $path;
    }

    protected function uniqueSlug(string $title, ?int $excludeId = null): string
    {
        $slug = Str::slug($title);
        $query = Blog::where('slug', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }
        if ($query->exists()) {
            $slug .= '-' . time();
        }
        return $slug;
    }
}
