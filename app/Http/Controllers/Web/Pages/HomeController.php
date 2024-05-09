<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Models\Major;
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

        return view('web.partials.partials.regions',compact('regions'));
    }
    public function search(Request $request): View 
    { 
        $query = ServiceProviderDetails::query()
                ->whereHas('user', function ($q) {
                    $q->active();
                })
                ->approved();

        $majorName = null;

        if ($request->filled('major')) { 
            $query->where('major_id', $request->major); 
            $majorName = Major::findOrFail($request->major);
        } 
    
        $query->when($request->filled('city') && $request->city != 'allCities', function ($query) use ($request) {
            
            return $query->where('city_id', $request->city); 
        }); 
        
        $query->when($request->filled('area') && $request->area != 'allAreas', function ($query) use ($request) { 

            return $query->where('region_id', $request->area); 
        }); 
        
        
        $results = $query->with('user','city','region','major','title')->paginate(10); 
        $total = $query->count();

        return view('web.pages.serviceProviders.index', compact('results','total', 'majorName')); 
    }
    public function show(ServiceProviderDetails $serviceProvider): View
    {
        return  view('web.pages.serviceProviders.show',compact('serviceProvider'));
    }
}
