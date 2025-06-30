<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::with(['file'])->active()->get();

        return view('frontend.categories.index', compact('categories'));
    }
    public function show(Category $category): View
    {
        $category->load('products');
        return view('frontend.categories.show', compact('category'));
    }
}
