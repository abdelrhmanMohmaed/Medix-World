<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\CityRequest;
use App\Models\City;
use App\Models\Region;
use Exception; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View
    {
        $cities  = City::get(); 

        return view('admin.pages.city.index',compact('cities'));
    }

    public function create(): View 
    {    
        return view('admin.pages.city.create');
    }

    public function store(CityRequest $request) : RedirectResponse
    {
        try {

            City::create([
                'name' => [
                    'en' => $request->input("name.en"),
                    'ar' => $request->input("name.ar")
                ],
            ]);

            return redirect()->route('admins.cities.index')->with('success', 'City created successfully');
        } catch (Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function edit(City $city) : View
    {
        return view('admin.pages.city.edit',compact('city'));
    }

    public function update(CityRequest $request, City $city) : RedirectResponse
    {
        try {
            $city->update([   
                'name' => [
                    'en' => $request->input("name.en"),
                    'ar' => $request->input("name.ar")
                ],
            ]);

            return redirect()->route('admins.cities.index')->with('success', ' City updated successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function destroy(City $city) : RedirectResponse 
    {
        try {
            if($city->serviceProviders->count() > 0){
                return redirect()->back()->with('error','can\'t delete, there are active service providers in this city');   
            }
            $city->regions()->delete();
            $city->serviceProviders()->delete();

            $city->delete();

            return redirect()->route('admins.cities.index')->with('success', 'city deleted successfully ');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function stauts(City $city) : RedirectResponse 
    {
        try {
            $city->update([   
                'active' => !$city->active
            ]);

            return redirect()->route('admins.cities.index');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function getRejions(City $city)  
    {
       $regions = $city->regions;

       return $regions;
    }

}
