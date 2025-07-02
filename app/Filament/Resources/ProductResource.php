<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?int $navigationSort    = 3;

    public static function getNavigationGroup(): ?string
    {
        return __('filament::resources.products.navigation_group');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament::resources.products.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('filament::resources.products.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament::resources.products.plural_model_label');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('ProductContent')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('filament::resources.products.settings'))
                            ->icon('heroicon-o-cog')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->schema([
                                        Forms\Components\FileUpload::make('images')
                                            ->label(__('filament::resources.products.image'))
                                            ->image()
                                            ->multiple()
                                            ->maxFiles(5)
                                            ->helperText(__('filament::resources.products.image_helper'))
                                            ->directory('products')
                                            ->required()
                                            ->columnSpan(4)
                                            ->maxSize(2048),

                                        Forms\Components\TextInput::make('code')
                                            ->label(__('filament::resources.products.code'))
                                            ->required()
                                            ->unique(Product::class, 'code', ignoreRecord: true)
                                            ->maxLength(50)
                                            ->columnSpan(2),

                                        Forms\Components\Select::make('category_id')
                                            ->label(__('filament::resources.products.category'))
                                            ->options(Category::active()->get()->pluck('name', 'id'))
                                            ->searchable()
                                            ->required()
                                            ->columnSpan(2),

                                        Forms\Components\Toggle::make('active')
                                            ->label(__('filament::resources.products.active'))
                                            ->default(true)
                                            ->onColor('success')
                                            ->offColor('danger')
                                            ->columnSpan(1),

                                        Forms\Components\Toggle::make('is_featured')
                                            ->label(__('filament::resources.products.is_featured'))
                                            ->default(false)
                                            ->onColor('primary')
                                            ->offColor('warning')
                                            ->columnSpan(1),
                                    ])
                                    ->columns(4),
                            ]),

                        Forms\Components\Tabs\Tab::make(__('filament::resources.products.translations'))
                            ->schema([
                                Forms\Components\Repeater::make('translations')
                                    ->relationship()
                                    ->label('')
                                    ->addActionLabel(__('filament::resources.products.add_translation'))
                                    ->schema([
                                        Forms\Components\Select::make('locale')
                                            ->label(__('filament::resources.products.language'))
                                            ->options([
                                                'en' => __('filament::resources.sliders.languages.en'),
                                                'ar' => __('filament::resources.sliders.languages.ar'),
                                            ])
                                            ->required()
                                            ->native(false)
                                            ->columnSpan(1),

                                        Forms\Components\TextInput::make('title')
                                            ->label(__('filament::resources.products.title'))
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

                                        Forms\Components\TextInput::make('short_description')
                                            ->label(__('filament::resources.products.short_description'))
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpan(2)
                                            ->hint(
                                                fn($state) => new HtmlString(
                                                    '<span class="text-xs text-gray-500">' . strlen(
                                                        $state ?? ''
                                                    ) . '/255</span>'
                                                )
                                            ),


                                        Forms\Components\Textarea::make('description')
                                            ->label(__('filament::resources.products.description'))
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
                                        Forms\Components\Textarea::make('specifications')
                                            ->label(__('filament::resources.products.specifications'))
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
                                        Forms\Components\Textarea::make('features')
                                            ->label(__('filament::resources.products.features'))
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
                Tables\Columns\ImageColumn::make('files.0.path')
                    ->label(__('filament::resources.products.image'))
                    ->getStateUsing(fn($record) => $record->files->first()?->path)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('code')
                    ->label(__('filament::resources.products.code'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('translations.title')
                    ->label(__('filament::resources.products.title'))
                    ->limit(30)
                    ->searchable(query: function ($query, $search) {
                        $query->whereHas('translations', function ($query) use ($search) {
                            $query->where('title', 'like', "%{$search}%");
                        });
                    }),

                Tables\Columns\IconColumn::make('active')
                    ->label(__('filament::resources.products.active'))
                    ->boolean()
                    ->sortable()
                    ->action(function ($record, Tables\Columns\IconColumn $column) {
                        $record->update([$column->getName() => ! $record->active]);
                    }),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label(__('filament::resources.products.is_featured'))
                    ->boolean()
                    ->sortable()
                    ->action(function ($record, Tables\Columns\IconColumn $column) {
                        $record->update([$column->getName() => ! $record->is_featured]);
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament::resources.products.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament::resources.products.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('active')
                    ->label(__('filament::resources.products.active_status')),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label(__('filament::resources.products.featured_status')),
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
                    ->recordTitle(fn($record) => $record->translate(app()->getLocale())->title ?? __('Product'))
                    ->action(function (Product $record) {
                        $record->file()->delete();
                        $record->translations()->delete();
                        $record->forceDelete();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label(__('filament::resources.products.delete_selected')),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label(__('filament::resources.products.create_product')),
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
            'index'  => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit'   => Pages\EditProduct::route('/{record}/edit'),
            'view'   => Pages\ViewProduct::route('/{record}'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
