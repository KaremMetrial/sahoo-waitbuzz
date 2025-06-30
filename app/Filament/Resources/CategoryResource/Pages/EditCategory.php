<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

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
