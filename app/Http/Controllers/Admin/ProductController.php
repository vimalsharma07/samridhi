<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::ordered()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateProduct($request);

        $product = new Product();
        $product->title = $validated['title'];
        $product->short_description = $validated['short_description'] ?? null;
        $product->description = $validated['description'] ?? null;
        $product->sort_order = (int) ($validated['sort_order'] ?? 0);
        $product->is_active = $request->boolean('is_active');
        $product->slug = $this->uniqueSlug($validated['title']);
        $product->applications = $this->parseApplications($request->input('applications_text'));

        if ($request->hasFile('featured_image')) {
            $product->featured_image = $this->moveImage($request->file('featured_image'), 'products');
        }

        $product->save();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $this->validateProduct($request);

        $product->title = $validated['title'];
        $product->short_description = $validated['short_description'] ?? null;
        $product->description = $validated['description'] ?? null;
        $product->sort_order = (int) ($validated['sort_order'] ?? 0);
        $product->is_active = $request->boolean('is_active');
        $product->slug = $this->uniqueSlug($validated['title'], $product->id);
        $product->applications = $this->parseApplications($request->input('applications_text'));

        if ($request->hasFile('featured_image')) {
            $product->featured_image = $this->moveImage($request->file('featured_image'), 'products');
        }

        $product->save();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    protected function validateProduct(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'image', 'max:2048'],
            'applications_text' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable'],
        ]);
    }

    protected function parseApplications(?string $text): array
    {
        if (empty(trim((string) $text))) {
            return [];
        }
        $lines = preg_split('/\r\n|\r|\n/', trim($text), -1, PREG_SPLIT_NO_EMPTY);
        return array_values(array_filter(array_map('trim', $lines)));
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
        $query = Product::where('slug', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }
        if ($query->exists()) {
            $slug .= '-' . time();
        }
        return $slug;
    }
}
