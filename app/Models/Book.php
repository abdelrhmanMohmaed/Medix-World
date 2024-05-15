<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;
    public $fillable = ['user_id','schedule_id','client_id','name','tel','email'];

    public function clientReview() : HasOne
    {
        return $this->hasOne(Review::class);
    }
    public function serviceProvider() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function client() : BelongsTo
    {
        return $this->belongsTo(User::class,'client_id');
    }
    public function schedule() : BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
}
