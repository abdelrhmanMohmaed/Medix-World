<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TermsController extends Controller
{
    public function index() : View 
    {   
        $terms = TermsCondition::active()->get();

        return view('web.pages.terms.index',compact('terms'));
    }
}
