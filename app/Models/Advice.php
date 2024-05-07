<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Advice extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['title','description'];
    public $fillable = ['user_id','title','description','img','active'];

    public function scopeActive($query): Builder
    {
        return $query->where('active', 1);
    }
    public function createBy() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}