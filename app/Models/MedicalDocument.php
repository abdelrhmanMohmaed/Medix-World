<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalDocument extends Model
{
    use HasFactory;
    public $fillable = ['user_id','major_id','client_id','title','description','file'];


    public function serviceProvider() : BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function client() : BelongsTo
    {
        return $this->belongsTo(User::class,'client_id');
    }


}
