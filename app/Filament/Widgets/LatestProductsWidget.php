<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\Widget;

class LatestProductsWidget extends Widget
{
    protected static string $view = 'filament.widgets.latest-products-widget';

    public array $latestProducts;
    protected static ?int $sort = 1;
    public function mount(): void
    {
        $this->latestProducts = Product::with(['category', 'files'])
            ->active()
            ->latest()
            ->limit(4)
            ->get()
            ->toArray();
    }
}