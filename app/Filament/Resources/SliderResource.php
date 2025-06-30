<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\SliderResource\Pages;
    use App\Models\Slider;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;
    use Illuminate\Support\HtmlString;

    class SliderResource extends Resource
    {
        protected static ?string $model = Slider::class;

        protected static ?string $navigationIcon = 'heroicon-o-photo';
        protected static ?int $navigationSort = 2;

        public static function getNavigationGroup(): ?string
        {
            return __('filament::resources.sliders.navigation_group');
        }

        public static function getNavigationLabel(): string
        {
            return __('filament::resources.sliders.navigation_label');
        }

        public static function getModelLabel(): string
        {
            return __('filament::resources.sliders.model_label');
        }

        public static function getPluralModelLabel(): string
        {
            return __('filament::resources.sliders.plural_model_label');
        }

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\Tabs::make('SliderContent')
                        ->tabs([
                            Forms\Components\Tabs\Tab::make(__('filament::resources.sliders.settings'))
                                ->icon('heroicon-o-cog')
                                ->schema([
                                    Forms\Components\Grid::make()
                                        ->schema([
                                            Forms\Components\FileUpload::make('image')
                                                ->label(__('filament::resources.sliders.image'))
                                                ->image()
                                                ->directory('sliders')
                                                ->required()
                                                ->columnSpan(3),

                                            Forms\Components\Select::make('type')
                                                ->options([
                                                    'home1' => __('filament::resources.sliders.types.home1'),
                                                    'home2' => __('filament::resources.sliders.types.home2'),
                                                ])
                                                ->required()
                                                ->label(__('filament::resources.sliders.type'))
                                                ->native(false)
                                                ->columnSpan(1),

                                            Forms\Components\TextInput::make('btn_link')
                                                ->label(__('filament::resources.sliders.button_link'))
                                                ->url()
                                                ->required()
                                                ->columnSpan(1)
                                                ->prefixIcon('heroicon-o-link')
                                                ->placeholder('https://example.com'),

                                            Forms\Components\Toggle::make('active')
                                                ->label(__('filament::resources.sliders.active'))
                                                ->default(true)
                                                ->onColor('success')
                                                ->offColor('danger')
                                                ->inline(false)
                                                ->columnSpan(1),
                                        ])
                                        ->columns(3),
                                ]),

                            Forms\Components\Tabs\Tab::make(__('filament::resources.sliders.translations'))
                                ->schema([
                                    Forms\Components\Repeater::make('translations')
                                        ->relationship()
                                        ->label('')
                                        ->addActionLabel(__('filament::resources.sliders.add_translation'))
                                        ->schema([
                                            Forms\Components\Select::make('locale')
                                                ->label(__('filament::resources.sliders.language'))
                                                ->options([
                                                    'en' => __('filament::resources.sliders.languages.en'),
                                                    'ar' => __('filament::resources.sliders.languages.ar'),
                                                ])
                                                ->required()
                                                ->native(false)
                                                ->columnSpan(1),

                                            Forms\Components\TextInput::make('title')
                                                ->label(__('filament::resources.sliders.title'))
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

                                            Forms\Components\Textarea::make('descriptions')
                                                ->label(__('filament::resources.sliders.description'))
                                                ->required()
                                                ->rows(4)
                                                ->columnSpanFull()
                                                ->hint(
                                                    fn($state) => new HtmlString(
                                                        '<span class="text-xs text-gray-500">' . strlen(
                                                            $state ?? ''
                                                        ) . ' characters</span>'
                                                    )
                                                )
                                                ->extraInputAttributes(['style' => 'min-height: 120px']),
                                        ])
                                        ->columns(2)
                                        ->collapsible()
                                        ->itemLabel(fn(array $state): string => $state['title'] ?? __('Translation'))
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
                        ->label(__('filament::resources.sliders.image'))
                        ->getStateUsing(fn($record) => $record->file?->path)
                        ->toggleable(),

                    Tables\Columns\TextColumn::make('type')
                        ->label(__('filament::resources.sliders.type'))
                        ->formatStateUsing(fn(string $state): string => __("filament::resources.sliders.types.$state"))
                        ->badge()
                        ->color(fn(string $state): string => match ($state) {
                            'home1' => 'primary',
                            'home2' => 'info',
                            default => 'gray',
                        })
                        ->sortable()
                        ->searchable(),

                    Tables\Columns\TextColumn::make('translations.title')
                        ->label(__('filament::resources.sliders.title'))
                        ->limit(30)
                        ->searchable(query: function ($query, $search) {
                            $query->whereHas('translations', function ($query) use ($search) {
                                $query->where('title', 'like', "%{$search}%");
                            });
                        }),
                    Tables\Columns\IconColumn::make('active')
                        ->label(__('filament::resources.sliders.active'))
                        ->boolean()
                        ->sortable()
                        ->action(function ($record, Tables\Columns\IconColumn $column) {
                            $record->update([$column->getName() => !$record->active]);
                        }),

                    Tables\Columns\TextColumn::make('created_at')
                        ->label(__('filament::resources.sliders.created_at'))
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),

                    Tables\Columns\TextColumn::make('updated_at')
                        ->label(__('filament::resources.sliders.updated_at'))
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                ])
                ->filters([
                    Tables\Filters\SelectFilter::make('type')
                        ->options([
                            'home1' => __('filament::resources.sliders.types.home1'),
                            'home2' => __('filament::resources.sliders.types.home2'),
                        ])
                        ->label(__('filament::resources.sliders.filter_by_type')),

                    Tables\Filters\TernaryFilter::make('active')
                        ->label(__('filament::resources.sliders.active_status')),
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
                        ->recordTitle(fn($record) => $record->translate(app()->getLocale())->title ?? __('Slider'))
                        ->action(function (Slider $record) {
                            $record->file()->delete();
                            $record->translations()->delete();
                            $record->forceDelete();
                        }),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make()
                            ->label(__('filament::resources.sliders.delete_selected')),
                    ]),
                ])
                ->emptyStateActions([
                    Tables\Actions\CreateAction::make()
                        ->label(__('filament::resources.sliders.create_slider')),
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
                'index' => Pages\ListSliders::route('/'),
                'create' => Pages\CreateSlider::route('/create'),
                'edit' => Pages\EditSlider::route('/{record}/edit'),
                'view' => Pages\ViewSlider::route('/{record}'),
            ];
        }

        public static function getNavigationBadge(): ?string
        {
            return static::getModel()::count();
        }
    }
