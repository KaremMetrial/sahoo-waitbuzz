<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Attributes\Scope;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\MorphOne;

    class Testimonial extends Model
    {
        protected $fillable = [
            'client_name',
            'rating',
            'content',
            'active',
        ];
        protected $casts = [
            'active' => 'boolean',
        ];

        // relation
        public function file(): MorphOne
        {
            return $this->morphOne(File::class, 'fileable');
        }

        // Scope
        #[Scope]
        protected function active(Builder $query): void
        {
            $query->where('active', true);
        }
    }
