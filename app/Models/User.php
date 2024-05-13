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
    public function serviceProviderDetails() : HasMany
    {
        return $this->hasMany(ServiceProviderDetails::class);
    }
    public function phones() : HasMany
    {
        return $this->hasMany(Phone::class);
    }
    public function serviceProviderSchedule() : HasMany
    {
        return $this->hasMany(Schedule::class);
    }    
    public function book() : HasMany
    {
        return $this->hasMany(Book::class);
    }   
    public function clientBook() : HasMany
    {
        return $this->hasMany(Book::class,'client_id');
    }    
    public function review() : HasMany
    {
        return $this->hasMany(Review::class);
    }   
    public function clientReview() : HasMany
    {
        return $this->hasMany(Review::class,'client_id');
    }
 
}
