<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    public $fillable = ['user_id','book_id','client_id','comment','rate','active'];

    public function serviceProvider() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function client() : BelongsTo
    {
        return $this->belongsTo(User::class,'client_id');
    }
    public function book() : BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
