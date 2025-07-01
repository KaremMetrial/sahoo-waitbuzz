<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;


class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function afterSave(): void
    {
        $data = $this->form->getState();
        if (!empty($data['image'])) {
            $file = $this->record->file;
            if ($file) {
                $file->update(['path' => $data['image']]);
            } else {
                $this->record->file()->create(['path' => $data['image']]);
            }
        }
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['image'] = $this->record->file?->path;

        return $data;
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
