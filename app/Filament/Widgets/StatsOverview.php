<?php
namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 0;
    protected function getStats(): array
    {
        return [
            Stat::make(__('dashboard.stats.active_categories'), Category::active()->count())
                ->url(route('filament.admin.resources.categories.index'))
                ->icon('heroicon-o-tag')
                ->description(__('dashboard.stats.active_categories_description')),

            Stat::make(__('dashboard.stats.featured_products'), Product::featured()->active()->count())
                ->url(route('filament.admin.resources.products.index'))
                ->icon('heroicon-o-star')
                ->description(__('dashboard.stats.featured_products_description')),

            Stat::make(__('dashboard.stats.total_products'), Product::active()->count())
                ->url(route('filament.admin.resources.products.index'))
                ->icon('heroicon-o-shopping-bag')
                ->description(__('dashboard.stats.total_products_description')),

            Stat::make(__('dashboard.stats.active_sliders'), Slider::active()->count())
                ->url(route('filament.admin.resources.sliders.index'))
                ->icon('heroicon-o-photo')
                ->description(__('dashboard.stats.active_sliders_description')),
        ];
    }
}
