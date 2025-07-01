<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $fillable = [
        'locale',
        'title',
        'short_description',
        'description',
        'product_id',
        'specifications',
        'features',
    ];
    public $timestamps = false;
}
