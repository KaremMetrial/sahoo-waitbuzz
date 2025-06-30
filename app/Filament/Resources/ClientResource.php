<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\ClientResource\Pages;
    use App\Models\Client;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;

    class ClientResource extends Resource
    {
        protected static ?string $model = Client::class;

        protected static ?string $navigationIcon = 'heroicon-o-users';
        protected static ?int $navigationSort = 3;

        public static function getNavigationGroup(): ?string
        {
            return __('filament::resources.clients.navigation_group');
        }

        public static function getNavigationLabel(): string
        {
            return __('filament::resources.clients.navigation_label');
        }

        public static function getModelLabel(): string
        {
            return __('filament::resources.clients.model_label');
        }

        public static function getPluralModelLabel(): string
        {
            return __('filament::resources.clients.plural_model_label');
        }

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\Grid::make()
                        ->schema([
                            Forms\Components\FileUpload::make('image')
                                ->label(__('filament::resources.clients.image'))
                                ->image()
                                ->directory('clients')
                                ->required()
                                ->columnSpan(3),

                            Forms\Components\TextInput::make('name')
                                ->label(__('filament::resources.clients.name'))
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(3),

                            Forms\Components\Toggle::make('active')
                                ->label(__('filament::resources.clients.active'))
                                ->default(true)
                                ->onColor('success')
                                ->offColor('danger')
                                ->inline(false)
                                ->columnSpan(1),
                        ])
                        ->columns(3),
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\ImageColumn::make('file.path')
                        ->label(__('filament::resources.clients.image'))
                        ->getStateUsing(fn($record) => $record->file?->path)
                        ->toggleable(),

                    Tables\Columns\TextColumn::make('name')
                        ->label(__('filament::resources.clients.name'))
                        ->searchable()
                        ->sortable(),

                    Tables\Columns\IconColumn::make('active')
                        ->label(__('filament::resources.clients.active'))
                        ->boolean()
                        ->sortable()
                        ->action(function ($record, Tables\Columns\IconColumn $column) {
                            $record->update([$column->getName() => !$record->active]);
                        }),

                    Tables\Columns\TextColumn::make('created_at')
                        ->label(__('filament::resources.clients.created_at'))
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),

                    Tables\Columns\TextColumn::make('updated_at')
                        ->label(__('filament::resources.clients.updated_at'))
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                ])
                ->filters([
                    Tables\Filters\TernaryFilter::make('active')
                        ->label(__('filament::resources.clients.active_status')),
                ])
                ->actions([
                    Tables\Actions\ViewAction::make()
                        ->label('')
                        ->icon('heroicon-o-eye'),

                    Tables\Actions\EditAction::make()
                        ->label('')
                        ->icon('heroicon-o-pencil'),

                    Tables\Actions\DeleteAction::make()
                        ->label('')
                        ->icon('heroicon-o-trash')
                        ->requiresConfirmation()
                        ->recordTitle(fn($record) => $record->name ?? __('Client'))
                        ->action(function (Client $record) {
                            $record->file()->delete();
                            $record->delete();
                        }),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make()
                            ->label(__('filament::resources.clients.delete_selected')),
                    ]),
                ])
                ->emptyStateActions([
                    Tables\Actions\CreateAction::make()
                        ->label(__('filament::resources.clients.create_client')),
                ])
                ->defaultSort('created_at', 'desc')
                ->paginated([10, 25, 50, 100]);
        }

        public static function getRelations(): array
        {
            return [];
        }

        public static function getPages(): array
        {
            return [
                'index' => Pages\ListClients::route('/'),
                'create' => Pages\CreateClient::route('/create'),
                'edit' => Pages\EditClient::route('/{record}/edit'),
                'view' => Pages\ViewClient::route('/{record}'),
            ];
        }

        public static function getNavigationBadge(): ?string
        {
            return static::getModel()::count();
        }
    }
