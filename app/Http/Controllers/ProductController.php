<?php

    namespace App\Http\Controllers;

    use App\Models\Product;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;

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

        public function index(Request $request): View
        {
            $products = Product::with(['files'])
                ->active()
                ->when($request->filled('search'), function ($query) use ($request) {
                    $query->where(function ($query) use ($request) {
                        $query->where('code', 'like', '%' . $request->search . '%')
                            ->orWhereHas('translations', function ($query) use ($request) {
                                $query->where('title', 'like', '%' . $request->search . '%')
                                    ->orWhere('description', 'like', '%' . $request->search . '%')
                                    ->orWhere('short_description', 'like', '%' . $request->search . '%')
                                    ->orWhere('specifications', 'like', '%' . $request->search . '%')
                                    ->orWhere('features', 'like', '%' . $request->search . '%');
                            });
                    });
                })
                ->cursorPaginate(9, ['*'], 'page', $request->get('page', 1));

            return view('frontend.products.index', compact('products'));
        }
    }
