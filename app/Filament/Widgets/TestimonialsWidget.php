<?php

namespace App\Filament\Widgets;

use App\Models\Testimonial;
use Filament\Widgets\Widget;

class TestimonialsWidget extends Widget
{
    protected static string $view = 'filament.widgets.testimonials-widget';

    public array $testimonials;
    protected static ?int $sort = 1;

    public function mount(): void
    {
        $this->testimonials = Testimonial::with('file')
            ->active()
            ->limit(5)
            ->get()
            ->toArray();
    }
}