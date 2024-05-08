<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Models\City;
use App\Models\Major;
use App\Models\Region;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() : View 
    {
        $advices = Advice::active()->get();
        $majors = Major::active()->get();
        $cities = City::active()->get();
        $regoins = Region::active()->get();

        return view('welcome',
    compact(['advices','majors','cities','regoins']));    
    }    

}
