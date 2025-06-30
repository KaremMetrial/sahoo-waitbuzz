<?php

    namespace App\Models;

    use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
    use Astrotomic\Translatable\Translatable;
    use Illuminate\Database\Eloquent\Attributes\Scope;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\MorphOne;

    class Slider extends Model implements TranslatableContract
    {
        use Translatable;

        public $translatedAttributes = ['title', 'descriptions'];

        protected $fillable = [
            'type',
            'btn_link',
            'active'
        ];
        protected $casts = [
            'active' => 'boolean',
            'type' => 'string',
        ];
        // Scope
        #[Scope]
        protected function active(Builder $query): void
        {
            $query->where('active', true);
        }
        // Relation
        public function file(): MorphOne
        {
            return $this->morphOne(File::class, 'fileable');
        }
        public function translations():HasMany
        {
            return $this->hasMany(SliderTranslation::class);
        }
    }
