<?php

namespace App\View\Composers;

use App\Models\Product;
use Illuminate\View\View;

class NavProductsComposer
{
    public function compose(View $view): void
    {
        $view->with('navProducts', Product::active()->ordered()->get(['id', 'title', 'slug']));
    }
}
