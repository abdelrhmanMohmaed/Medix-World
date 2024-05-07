<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ServiceProviderDetails extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name','summary','address'];
    public $fillable = ['user_id', 'city_id','region_id', 'title_id', 'major_id', 'name','summary',	'address','price', 'img', 'medical_card','status'];

}