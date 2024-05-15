<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class ServiceProviderDetails extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'summary', 'address'];

    public $fillable = [
        'user_id',
        'city_id',
        'region_id',
        'title_id',
        'major_id',
        'name',
        'summary',
        'address',
        'price',
        'tel',
        'img',
        'medical_card',
        'status'
    ];


    # Getter and Setter
    // remove it 
    public function getImageAttribute()
    {
        return url('assets/images/services/avatars/' . $this->img);
    }


    # Relation

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function title(): BelongsTo
    {
        return $this->belongsTo(Title::class);
    }

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
    # Scope

    public function scopeNotApproved($query)
    {
        return $query->where('status', '<>', 'Approval');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'Approval');
    }
}
