<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Translatable\HasTranslations;

class Region extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name'];
    public $fillable = ['city_id','name','active'];
    public function scopeActive($query): Builder
    {
        return $query->where('active', 1);
    }    
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
