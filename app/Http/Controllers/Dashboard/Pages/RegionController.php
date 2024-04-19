<?php

namespace App\Http\Controllers\Dashboard\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Pages\RegionRequest;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegionController extends Controller
{
    public function index() : View 
    {
        $regions  = Region::with('city')->get(); 

        return view('dashboard.pages.region.index',compact('regions'));
    } 
    public function create(): View 
    {    
        $cities  = City::get(); 
        return view('dashboard.pages.region.create',compact('cities'));
    }
    public function store(RegionRequest $request): View 
    {
        Region::create([   
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar']
                ],
            'city_id'=>$request->city_id,
        ]);
        return view('dashboard.pages.region.create');
    }

    
}