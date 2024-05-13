<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class TermsCondition extends Model
{
    public $table = "terms_condations";
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'description',
        'sub_description'
    ];

    public $fillable = [
        'user_id',
        // 'terms_condation_id',
        'title',
        'description',
        'sub_description',
        'active'
    ];
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function parent()
    {
        return $this->belongsTo(self::class);
    }
    public function createBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
