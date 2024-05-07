<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Major extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name'];
    public $fillable = ['name','active'];
    public function scopeActive($query): Builder
    {
        return $query->where('active', 1);
    }
    
}
