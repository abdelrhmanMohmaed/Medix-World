<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\TermsCondation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TermsController extends Controller
{
    public function index() : View 
    {   
        $terms = TermsCondation::active()->get();

        return view('web.pages.terms.index',compact('terms'));
    }
}
