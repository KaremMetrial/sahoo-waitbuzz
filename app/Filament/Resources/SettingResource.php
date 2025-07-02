<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?int $navigationSort = 99;

    public static function getNavigationGroup(): ?string
    {
        return __('filament::resources.settings.navigation_group');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament::resources.settings.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('filament::resources.settings.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament::resources.settings.plural_model_label');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\TextInput::make('key')
                            ->label(__('filament::resources.settings.key'))
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1)
                            ->disabled(fn (?Setting $record) => $record !== null),

                        Forms\Components\FileUpload::make('value')
                            ->label(__('filament::resources.settings.value'))
                            ->image()
                            ->directory('settings')
                            ->visibility('public')
                            ->columnSpan(2)
                            ->visible(fn ($get) => $get('key') === 'logo')
                            ->required(fn ($get) => $get('key') === 'logo'),

                        Forms\Components\TextInput::make('value')
                            ->label(__('filament::resources.settings.value'))
                            ->maxLength(255)
                            ->columnSpan(2)
                            ->hidden(fn ($get) => $get('key') === 'logo')
                            ->required(fn ($get) => $get('key') !== 'logo'),

                        Forms\Components\Toggle::make('active')
                            ->label(__('filament::resources.settings.active'))
                            ->default(true)
                            ->onColor('success')
                            ->offColor('danger')
                            ->inline(false)
                            ->columnSpan(1),
                    ])
                    ->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label(__('filament::resources.settings.key'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('value')
                    ->label(__('filament::resources.settings.value'))
                    ->toggleable()
                    ->visible(fn ($record) => $record?->key === 'logo'),

                Tables\Columns\TextColumn::make('value')
                    ->label(__('filament::resources.settings.value'))
                    ->limit(50)
                    ->searchable()
                    ->toggleable()
                    ->hidden(fn ($record) => $record?->key === 'logo'),

                Tables\Columns\IconColumn::make('active')
                    ->label(__('filament::resources.settings.active'))
                    ->boolean()
                    ->sortable()
                    ->action(function ($record, Tables\Columns\IconColumn $column) {
                        $record->update([$column->getName() => !$record->active]);
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament::resources.settings.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament::resources.settings.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('active')
                    ->label(__('filament::resources.settings.active_status')),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('')
                    ->icon('heroicon-o-pencil'),
            ])
            ->bulkActions([
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label(__('filament::resources.settings.create_setting')),
            ])
            ->defaultSort('key', 'asc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}