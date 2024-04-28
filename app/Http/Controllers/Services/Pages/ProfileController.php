<?php

namespace App\Http\Controllers\Services\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index() : View 
    {
        return view('service.pages.profile.index');    
    } 
}
