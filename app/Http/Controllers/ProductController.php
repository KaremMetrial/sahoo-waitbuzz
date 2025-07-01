<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function show(Product $product): View
    {
        $product->load('files', 'category');

        $similarProducts = $product->category->products()
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('frontend.products.show', compact('product', 'similarProducts'));
    }
    public function ourFeaturedProject(): View
    {
        $products = Product::with(['files'])->active()->featured()->limit(6)->get();

        return view('frontend.products.featured', compact('products'));
    }
}
