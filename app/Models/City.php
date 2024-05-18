<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name'];
    public $fillable = ['name','active'];

    public function scopeActive($query): Builder
    {
        return $query->where('active', 1);
    }

    public function scopeInactive($query): Builder
    {
        return $query->where('active', 0);
    }


    public function regions(): HasMany
    {
        return $this->hasMany(Region::class);
    }
    public function serviceProviders()
    {
        return $this->hasMany(ServiceProviderDetails::class);
    }
}