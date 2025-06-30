<?php

    namespace App\Models;

    use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
    use Astrotomic\Translatable\Translatable;
    use Illuminate\Database\Eloquent\Attributes\Scope;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\MorphOne;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Product extends Model implements TranslatableContract
    {
        use Translatable;

        public $translatedAttributes = ['title', 'short_description', 'description'];

        protected $fillable = [
            'active',
            'code',
            'is_featured',
            'category_id',
        ];
        protected $casts = [
            'active' => 'boolean',
            'is_featured' => 'boolean',
        ];

        // Relation

        public function file(): MorphOne
        {
            return $this->morphOne(File::class, 'fileable');
        }

        public function translations(): HasMany
        {
            return $this->hasMany(ProductTranslation::class);
        }
        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }

        // Scopes
        #[Scope]
        protected function active(Builder $query): void
        {
            $query->where('active', true);
        }

        #[Scope]
        protected function featured(Builder $query): void
        {
            $query->where('is_featured', true);
        }
    }
