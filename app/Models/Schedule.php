<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','start_time','end_time'];

    public function book() : HasOne
    {
        return $this->hasOne(Book::class);    
    }  
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);    
    }
}

