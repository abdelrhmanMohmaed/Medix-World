<?php

namespace App\Http\Controllers\Dashboard\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Pages\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index()   
    {
        $cities  = City::get(); 
        // return response()->json($cities);
        return view('dashboard.pages.city.index',compact('cities'));
    } 
    public function create(): View 
    {    
        return view('dashboard.pages.city.create');
    }
    public function store(CityRequest $request): View 
    {
        City::create([   
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar']
                ],
        ]);
        return view('dashboard.pages.city.create');
    }
}