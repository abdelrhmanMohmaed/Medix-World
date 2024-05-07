<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() : View 
    {
        $advices = Advice::active()->get();

        return view('welcome',
    compact(['advices']));    
    }    

}
