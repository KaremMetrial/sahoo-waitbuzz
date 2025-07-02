<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\Widget;

class FeaturedProductsWidget extends Widget
{
    protected static string $view = 'filament.widgets.featured-products-widget';

    public array $featuredProducts;
    protected static ?int $sort = 1;

    public function mount(): void
    {
        $this->featuredProducts = Product::with(['category', 'files'])
            ->featured()
            ->active()
            ->limit(4)
            ->get()
            ->toArray();
    }
}