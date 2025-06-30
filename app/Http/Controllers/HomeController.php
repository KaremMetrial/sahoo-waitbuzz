<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Slider;
class HomeController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::with('file')->active()->get();
        return view('frontend.home.index', compact('sliders'));
    }
}
