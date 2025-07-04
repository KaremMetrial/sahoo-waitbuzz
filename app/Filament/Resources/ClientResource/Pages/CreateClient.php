<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;
    protected function afterCreate(): void
    {
        $data = $this->form->getState();
        if (!empty($data['image'])) {
            $this->record->file()->create([
                'path' => $data['image'],
            ]);
        }
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
