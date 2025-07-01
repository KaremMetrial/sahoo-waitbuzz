<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductResource;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

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

        if (!empty($data['images']) && is_array($data['images'])) {
            foreach ($this->record->files as $file) {
                Storage::delete($file->path);
                $file->delete();
            }

            foreach ($data['images'] as $path) {
                $this->record->files()->create(['path' => $path]);
            }
        }
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['images'] = $this->record->files->pluck('path')->toArray();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
