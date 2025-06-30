<?php

    namespace App\Filament\Resources;

    use App\Filament\Resources\TestimonialResource\Pages;
    use App\Models\Testimonial;
    use Filament\Forms;
    use Filament\Forms\Form;
    use Filament\Resources\Resource;
    use Filament\Tables;
    use Filament\Tables\Table;

    class TestimonialResource extends Resource
    {
        protected static ?string $model = Testimonial::class;

        protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
        protected static ?int $navigationSort = 4;

        public static function getNavigationGroup(): ?string
        {
            return __('filament::resources.testimonials.navigation_group');
        }

        public static function getNavigationLabel(): string
        {
            return __('filament::resources.testimonials.navigation_label');
        }

        public static function getModelLabel(): string
        {
            return __('filament::resources.testimonials.model_label');
        }

        public static function getPluralModelLabel(): string
        {
            return __('filament::resources.testimonials.plural_model_label');
        }

        public static function form(Form $form): Form
        {
            return $form
                ->schema([
                    Forms\Components\Grid::make()
                        ->schema([
                            Forms\Components\FileUpload::make('image')
                                ->label(__('filament::resources.testimonials.image'))
                                ->image()
                                ->directory('testimonials')
                                ->required()
                                ->columnSpan(3),

                            Forms\Components\TextInput::make('client_name')
                                ->label(__('filament::resources.testimonials.client_name'))
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(2),

                            Forms\Components\Select::make('rating')
                                ->label(__('filament::resources.testimonials.rating'))
                                ->options([
                                    1 => __('filament::resources.testimonials.stars.1'),
                                    2 => __('filament::resources.testimonials.stars.2'),
                                    3 => __('filament::resources.testimonials.stars.3'),
                                    4 => __('filament::resources.testimonials.stars.4'),
                                    5 => __('filament::resources.testimonials.stars.5'),
                                ])
                                ->required()
                                ->native(false)
                                ->columnSpan(1),

                            Forms\Components\Toggle::make('active')
                                ->label(__('filament::resources.testimonials.active'))
                                ->default(true)
                                ->onColor('success')
                                ->offColor('danger')
                                ->inline(false)
                                ->columnSpan(1),
                        ])
                        ->columns(3),

                    Forms\Components\Textarea::make('content')
                        ->label(__('filament::resources.testimonials.content'))
                        ->required()
                        ->rows(4)
                        ->columnSpanFull()
                        ->extraInputAttributes(['style' => 'min-height: 120px']),
                ]);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    Tables\Columns\ImageColumn::make('file.path')
                        ->label(__('filament::resources.testimonials.image'))
                        ->getStateUsing(fn($record) => $record->file?->path)
                        ->toggleable(),

                    Tables\Columns\TextColumn::make('client_name')
                        ->label(__('filament::resources.testimonials.client_name'))
                        ->searchable()
                        ->sortable(),

                    Tables\Columns\TextColumn::make('content')
                        ->label(__('filament::resources.testimonials.content'))
                        ->limit(50)
                        ->searchable(),

                    Tables\Columns\SelectColumn::make('rating')
                        ->label(__('filament::resources.testimonials.rating'))
                        ->options([
                            1 => __('filament::resources.testimonials.stars.1'),
                            2 => __('filament::resources.testimonials.stars.2'),
                            3 => __('filament::resources.testimonials.stars.3'),
                            4 => __('filament::resources.testimonials.stars.4'),
                            5 => __('filament::resources.testimonials.stars.5'),
                        ])
                        ->sortable(),

                    Tables\Columns\IconColumn::make('active')
                        ->label(__('filament::resources.testimonials.active'))
                        ->boolean()
                        ->sortable()
                        ->action(function ($record, Tables\Columns\IconColumn $column) {
                            $record->update([$column->getName() => !$record->active]);
                        }),

                    Tables\Columns\TextColumn::make('created_at')
                        ->label(__('filament::resources.testimonials.created_at'))
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),

                    Tables\Columns\TextColumn::make('updated_at')
                        ->label(__('filament::resources.testimonials.updated_at'))
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                ])
                ->filters([
                    Tables\Filters\TernaryFilter::make('active')
                        ->label(__('filament::resources.testimonials.active_status')),

                    Tables\Filters\SelectFilter::make('rating')
                        ->label(__('filament::resources.testimonials.rating'))
                        ->options([
                            1 => __('filament::resources.testimonials.stars.1'),
                            2 => __('filament::resources.testimonials.stars.2'),
                            3 => __('filament::resources.testimonials.stars.3'),
                            4 => __('filament::resources.testimonials.stars.4'),
                            5 => __('filament::resources.testimonials.stars.5'),
                        ]),
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
                        ->recordTitle(fn($record) => $record->client_name ?? __('Testimonial'))
                        ->action(function (Testimonial $record) {
                            $record->file()->delete();
                            $record->delete();
                        }),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make()
                            ->label(__('filament::resources.testimonials.delete_selected')),
                    ]),
                ])
                ->emptyStateActions([
                    Tables\Actions\CreateAction::make()
                        ->label(__('filament::resources.testimonials.create_testimonial')),
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
                'index' => Pages\ListTestimonials::route('/'),
                'create' => Pages\CreateTestimonial::route('/create'),
                'edit' => Pages\EditTestimonial::route('/{record}/edit'),
                'view' => Pages\ViewTestimonial::route('/{record}'),
            ];
        }

        public static function getNavigationBadge(): ?string
        {
            return static::getModel()::count();
        }
    }
