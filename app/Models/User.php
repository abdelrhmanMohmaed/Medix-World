<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'password', 'dateOfBirth', 'gender', 'active'
    ];
    protected $hidden = [ 'password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime','password' => 'hashed'];

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['dateOfBirth'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
    function serviceProviderDetails() : HasMany
    {
        return $this->hasMany(ServiceProviderDetails::class);
    }
    function phones() : HasMany
    {
        return $this->hasMany(Phone::class);
    }

}
