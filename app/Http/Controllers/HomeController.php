<?php

    namespace App\Http\Controllers;

    use App\Models\Category;
    use App\Models\Client;
    use App\Models\Product;
    use App\Models\Slider;
    use App\Models\Testimonial;
    use Illuminate\Contracts\View\View;

    class HomeController extends Controller
    {
        public function index(): View
        {
            $sliders = Slider::with('file')->active()->get();

            $categories = Category::with('file')->active()->get();

            $productFeatured = Product::with('file')->active()->featured()->limit(3)->get();

            $clients = Client::with('file')->active()->get();

            $testimonials = Testimonial::with('file')->active()->get();

            return view('frontend.home.index', compact('sliders', 'categories', 'productFeatured', 'clients', 'testimonials'));
        }
    }
