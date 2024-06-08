<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $guard_name = "web";
    
    protected $fillable = [
        'name', 'email', 'password', 'dateOfBirth', 'gender', 'active'
    ];
    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['dateOfBirth'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', false);
    }

    public function scopeUser($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('roles.name', 'User');
        });
    }

    public function scopeAdmin($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('roles.name', 'Admin');
        });
    }

 public function scopeServiceProvider($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('roles.name', 'Service Providers');
        });
    }


    public function serviceProviderDetails(): HasOne
    {
        return $this->hasOne(ServiceProviderDetails::class);
    }
    public function personalPhones(): HasMany
    {
        return $this->hasMany(Phone::class)->where('type','personal');
    }
    public function clinicPhones(): HasMany
    {
        return $this->hasMany(Phone::class)->where('type','clinic');
    }
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }
    public function serviceProviderSchedule(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
    public function book(): HasMany
    {
        return $this->hasMany(Book::class);
    }
    public function clientBook(): HasMany
    {
        return $this->hasMany(Book::class, 'client_id');
    }
    public function review(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function activeReview(): HasMany
    {
        return $this->hasMany(Review::class)->where('active',true);
    }
    public function clientReview(): HasMany
    {
        return $this->hasMany(Review::class, 'client_id');
    }
    public function clientMedicalFiles(): HasMany
    {
        return $this->hasMany(MedicalDocument::class, 'client_id');
    }
}
