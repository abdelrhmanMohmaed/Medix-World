<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Models\Book;
use App\Models\Major;
use App\Models\Region;
use App\Models\Schedule;
use App\Models\ServiceProviderDetails;
use App\Models\Title;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function show(ServiceProviderDetails $serviceProvider): View
    {
        $serviceProvider->load(['user', 'city', 'region', 'major', 'title' , 
            'user.serviceProviderSchedule' => function ($q) {
            
                $q->whereDoesntHave('book');
            }
        ]);

        return  view('web.pages.serviceProviders.show',compact('serviceProvider'));
    }
    public function store(Schedule $schedule ,ServiceProviderDetails $serviceProvider, Request $request): RedirectResponse
    {
        try {
            $checkBook = Book::where('schedule_id',$schedule->id)->first();
            if($checkBook)
            {
                return redirect()->back()->with('wrong',__('website/web.wrong'));
            }
            
            Book::create([
                'user_id' => $serviceProvider->user_id,
                'schedule_id' => $schedule->id,
                'client_id' => Auth::id(),
                'name' => $request->input('fullName'),
                'tel' => $request->input('tel'),
                'email' => $request->input('email')
            ]);

            return redirect()->route('website.search.service-provider.show',$serviceProvider->id)->with('success',__('website/web.success-book'));
        
        } catch (Exception $e) {

            return redirect()->back()->with('wrong',__('website/web.wrong'));
        }
        
    }



    public function search(Request $request): View
    {
        $majorName = null;
        $major = $request->major;
        $city = $request->city;
        $area = $request->area;

        $titles = Title::active()->get();

        $query = ServiceProviderDetails::query()
            ->whereHas('user', function ($q) {
                $q->active();
            })
            ->approved();

        if ($request->filled('major') && $major != 'allMajors' ) {
            $query->where('major_id', $major);
            $majorName = Major::findOrFail($major);
        }

        $query->when($request->filled('city') && $city != 'allCities', function ($query) use ($city) {

            return $query->where('city_id', $city);
        });
    
        $query->when($request->filled('area') && $area != 'allAreas', function ($query) use ($area) {

            return $query->where('region_id', $area);
        });
    
        $query->when($request->filled('title'), function ($query) use ($request) {
            return $query->whereIn('title_id', $request->title);
        });
        
        $query->when($request->filled('gender'), function ($query) use ($request) {
            return $query->whereHas('user', function ($q) use ($request) {
                $q->whereIn('gender', $request->gender);
            });
        });

        $query->when($request->filled('price_range'), function ($query) use ($request) {
            $priceRanges = $request->price_range;
            $query->where(function ($query) use ($priceRanges) {
                foreach ($priceRanges as $range) {
                    [$min, $max] = explode('-', $range);
                    
                    $query->orWhereBetween('price', [$min, $max]);
                }
            });
        
            return $query;
        });


        $results = $query->with(['user', 'city', 'region', 'major', 'title', 'user.serviceProviderSchedule' => function ($q) {
            $q->whereDoesntHave('book');
        }])->paginate(10)->withQueryString();

        return view('web.pages.serviceProviders.index', compact(
            'results', 'majorName','titles',
            'major','city','area'
        ));
    }
    public function filter(Request $request) 
    {
        $query = ServiceProviderDetails::query()
            ->whereHas('user', function ($q) {
                $q->active();
            })
            ->approved();
    
            if ($request->filled('major') && $request->major != 'allMajors' ) {
                $query->where('major_id', $request->major);
                $majorName = Major::findOrFail($request->major);
            }

        $query->when($request->filled('city') && $request->city != 'allCities', function ($query) use ($request) {
            return $query->where('city_id', $request->city);
        });
    
        $query->when($request->filled('area') && $request->area != 'allAreas', function ($query) use ($request) {
            return $query->where('region_id', $request->area);
        });
        
        $query->when($request->filled('title'), function ($query) use ($request) {
            return $query->whereIn('title_id', $request->title);
        });
        
        $query->when($request->filled('gender'), function ($query) use ($request) {
            return $query->whereHas('user', function ($q) use ($request) {
                $q->whereIn('gender', $request->gender);
            });
        });

        $query->when($request->filled('price_range'), function ($query) use ($request) {
            $priceRanges = $request->price_range;
            $query->where(function ($query) use ($priceRanges) {
                foreach ($priceRanges as $range) {
                    [$min, $max] = explode('-', $range);
                    
                    $query->orWhereBetween('price', [$min, $max]);
                }
            });
        
            return $query;
        });
        
        $results = $query->with(['user', 'city', 'region', 'major', 'title' , 
            'user.serviceProviderSchedule' => function ($q) {
            
                $q->whereDoesntHave('book');
            }
        ])->paginate(10)->withQueryString();
 
        return view('web.pages.serviceProviders.partials.filter', compact('results'));
    }
    public function booking(Schedule $schedule ,ServiceProviderDetails $serviceProvider): View
    {
        return  view('web.pages.serviceProviders.booking',compact('schedule','serviceProvider'));
    }

}
