<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Models\Region;
use App\Models\ServiceProviderDetails;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() : View 
    {
        $advices = Advice::active()->get();

        return view('welcome',compact('advices'));    
    }    
    public function axiosRegion($id): View
    {
        $regions = Region::whereCityId($id)->get();

        return view('service.auth.partials.regions',compact('regions'));
    }
 
    public function search(Request $request): View
    {
        $query = ServiceProviderDetails::query();
    
        $query->when($request->filled('major_id'), function ($query) use ($request) {
            return $query->where('major_id', $request->major_id);
        });
    
        $query->when($request->filled('city_id') && $request->city_id != 'allCities', function ($query) use ($request) {
            return $query->where('city_id', $request->city_id);
        });
    
        $query->when($request->filled('region_id') && $request->region_id != 'allAreas', function ($query) use ($request) {
            return $query->where('region_id', $request->region_id);
        });

        $results = $query->get();
        
        return view('web.pages.serviceProviders.index', compact('results'));
    }
    
}
