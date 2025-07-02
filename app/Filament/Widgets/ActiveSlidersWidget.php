<?php

namespace App\Filament\Widgets;

use App\Models\Slider;
use Filament\Widgets\Widget;

class ActiveSlidersWidget extends Widget
{
    protected static ?int $sort = 1;
    protected static string $view = 'filament.widgets.active-sliders-widget';

    public array $activeSliders;

    public function mount(): void
    {
        $this->activeSliders = Slider::with(['file', 'translations'])
            ->active()
            ->get()
            ->toArray();
    }

}
