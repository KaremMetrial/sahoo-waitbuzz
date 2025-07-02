<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use Filament\Widgets\Widget;

class ClientsWidget extends Widget
{
    protected static string $view = 'filament.widgets.clients-widget';

    public array $clients;
    protected static ?int $sort = 1;

    public function mount(): void
    {
        $this->clients = Client::with('file')
            ->active()
            ->get()
            ->toArray();
    }
}