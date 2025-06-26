<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'path',
        'fileable_id',
        'fileable_type'
    ];
    // Relations
    public function fileable()
    {
        return $this->morphTo();
    }
}
