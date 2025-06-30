<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\CategoryResource\Pages;
    use App\Models\Category;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Support\HtmlString;

    class CategoryResource extends Resource
    {
        protected static ?string $model = Category::class;

        protected static ?string $navigationIcon = 'heroicon-o-tag';
        protected static ?int $navigationSort = 2;

        public static function getNavigationGroup(): ?string
        {
            return __('filament::resources.categories.navigation_group');
        }

        public static function getNavigationLabel(): string
        {
            return __('filament::resources.categories.navigation_label');
        }

        public static function getModelLabel(): string
        {
            return __('filament::resources.categories.model_label');
        }

        public static function getPluralModelLabel(): string
        {
            return __('filament::resources.categories.plural_model_label');
        }

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\Tabs::make('CategoryContent')
                        ->tabs([
                            Forms\Components\Tabs\Tab::make(__('filament::resources.categories.settings'))
                                ->icon('heroicon-o-cog')
                                ->schema([
                                    Forms\Components\Grid::make()
                                        ->schema([
                                            Forms\Components\FileUpload::make('image')
                                                ->label(__('filament::resources.categories.image'))
                                                ->image()
                                                ->directory('categories')
                                                ->required()
                                                ->columnSpan(3),

                                            Forms\Components\Toggle::make('active')
                                                ->label(__('filament::resources.categories.active'))
                                                ->default(true)
                                                ->onColor('success')
                                                ->offColor('danger')
                                                ->inline(false)
                                                ->columnSpan(1),
                                        ])
                                        ->columns(3),
                                ]),

                            Forms\Components\Tabs\Tab::make(__('filament::resources.categories.translations'))
                                ->schema([
                                    Forms\Components\Repeater::make('translations')
                                        ->relationship()
                                        ->label('')
                                        ->addActionLabel(__('filament::resources.categories.add_translation'))
                                        ->schema([
                                            Forms\Components\Select::make('locale')
                                                ->label(__('filament::resources.categories.language'))
                                                ->options([
                                                    'en' => __('filament::resources.sliders.languages.en'),
                                                    'ar' => __('filament::resources.sliders.languages.ar'),
                                                ])
                                                ->required()
                                                ->native(false)
                                                ->columnSpan(1),

                                            Forms\Components\TextInput::make('name')
                                                ->label(__('filament::resources.categories.name'))
                                                ->required()
                                                ->maxLength(255)
                                                ->columnSpan(1)
                                                ->hint(
                                                    fn($state) => new HtmlString(
                                                        '<span class="text-xs text-gray-500">' . strlen(
                                                            $state ?? ''
                                                        ) . '/255</span>'
                                                    )
                                                ),
                                        ])
                                        ->columns(2)
                                        ->collapsible()
                                        ->itemLabel(fn(array $state): string => $state['name'] ?? __('Translation'))
                                        ->cloneable(),
                                ]),
                        ])
                        ->persistTabInQueryString()
                        ->columnSpanFull(),
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\ImageColumn::make('file.path')
                        ->label(__('filament::resources.categories.image'))
                        ->getStateUsing(fn($record) => $record->file?->path)
                        ->toggleable(),

                    Tables\Columns\TextColumn::make('translations.name')
                        ->label(__('filament::resources.categories.name'))
                        ->limit(30)
                        ->searchable(query: function ($query, $search) {
                            $query->whereHas('translations', function ($query) use ($search) {
                                $query->where('name', 'like', "%{$search}%");
                            });
                        }),

                    Tables\Columns\IconColumn::make('active')
                        ->label(__('filament::resources.categories.active'))
                        ->boolean()
                        ->sortable()
                        ->action(function ($record, Tables\Columns\IconColumn $column) {
                            $record->update([$column->getName() => !$record->active]);
                        }),

                    Tables\Columns\TextColumn::make('created_at')
                        ->label(__('filament::resources.categories.created_at'))
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),

                    Tables\Columns\TextColumn::make('updated_at')
                        ->label(__('filament::resources.categories.updated_at'))
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                ])
                ->filters([
                    Tables\Filters\TernaryFilter::make('active')
                        ->label(__('filament::resources.categories.active_status')),
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
                        ->recordTitle(fn($record) => $record->translate(app()->getLocale())->name ?? __('Category'))
                        ->action(function (Category $record) {
                            $record->file()->delete();
                            $record->translations()->delete();
                            $record->forceDelete();
                        }),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make()
                            ->label(__('filament::resources.categories.delete_selected')),
                    ]),
                ])
                ->emptyStateActions([
                    Tables\Actions\CreateAction::make()
                        ->label(__('filament::resources.categories.create_category')),
                ])
                ->defaultSort('created_at', 'desc')
                ->reorderable('sort_order')
                ->paginated([10, 25, 50, 100]);
        }

        public static function getRelations(): array
        {
            return [
                // Add relations if needed
            ];
        }

        public static function getPages(): array
        {
            return [
                'index' => Pages\ListCategories::route('/'),
                'create' => Pages\CreateCategory::route('/create'),
                'edit' => Pages\EditCategory::route('/{record}/edit'),
                'view' => Pages\ViewCategory::route('/{record}'),
            ];
        }

        public static function getNavigationBadge(): ?string
        {
            return static::getModel()::count();
        }
    }
