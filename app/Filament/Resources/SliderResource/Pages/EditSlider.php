<?php

namespace App\Filament\Resources\SliderResource\Pages;

use App\Filament\Resources\SliderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;


class EditSlider extends EditRecord
{
    protected static string $resource = SliderResource::class;

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
