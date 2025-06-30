<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\ContactResource\Pages;
    use App\Models\Contact;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;

    class ContactResource extends Resource
    {
        protected static ?string $model = Contact::class;

        protected static ?string $navigationIcon = 'heroicon-o-envelope';
        protected static ?int $navigationSort = 5;

        public static function getNavigationGroup(): ?string
        {
            return __('filament::resources.contacts.navigation_group');
        }

        public static function getNavigationLabel(): string
        {
            return __('filament::resources.contacts.navigation_label');
        }

        public static function getModelLabel(): string
        {
            return __('filament::resources.contacts.model_label');
        }

        public static function getPluralModelLabel(): string
        {
            return __('filament::resources.contacts.plural_model_label');
        }

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\Grid::make()
                        ->schema([
                            Forms\Components\TextInput::make('first_name')
                                ->label(__('filament::resources.contacts.first_name'))
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(1),

                            Forms\Components\TextInput::make('last_name')
                                ->label(__('filament::resources.contacts.last_name'))
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(1),
                        ])
                        ->columns(2),

                    Forms\Components\Grid::make()
                        ->schema([
                            Forms\Components\TextInput::make('email')
                                ->label(__('filament::resources.contacts.email'))
                                ->email()
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(1),

                            Forms\Components\TextInput::make('phone')
                                ->label(__('filament::resources.contacts.phone'))
                                ->tel()
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(1),
                        ])
                        ->columns(2),

                    Forms\Components\Textarea::make('message')
                        ->label(__('filament::resources.contacts.message'))
                        ->required()
                        ->rows(5)
                        ->columnSpanFull()
                        ->extraInputAttributes(['style' => 'min-height: 150px']),
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('first_name')
                        ->label(__('filament::resources.contacts.first_name'))
                        ->searchable()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('last_name')
                        ->label(__('filament::resources.contacts.last_name'))
                        ->searchable()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('email')
                        ->label(__('filament::resources.contacts.email'))
                        ->searchable()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('phone')
                        ->label(__('filament::resources.contacts.phone'))
                        ->searchable()
                        ->sortable()
                        ->toggleable(),

                    Tables\Columns\TextColumn::make('message')
                        ->label(__('filament::resources.contacts.message'))
                        ->limit(50)
                        ->toggleable(isToggledHiddenByDefault: true),

                    Tables\Columns\TextColumn::make('created_at')
                        ->label(__('filament::resources.contacts.created_at'))
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                ])
                ->filters([
                    // Add filters if needed
                ])
                ->actions([
                    Tables\Actions\ViewAction::make()
                        ->label('')
                        ->icon('heroicon-o-eye'),

                ])
                ->bulkActions([

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
                'index' => Pages\ListContacts::route('/'),
                'view' => Pages\ViewContact::route('/{record}'),
            ];
        }

        public static function getNavigationBadge(): ?string
        {
            return static::getModel()::count();
        }
    }
