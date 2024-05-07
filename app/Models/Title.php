<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Title extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['title'];

    public function scopeActive($query): Builder
    {
        return $query->where('active', 1);
    }
}
