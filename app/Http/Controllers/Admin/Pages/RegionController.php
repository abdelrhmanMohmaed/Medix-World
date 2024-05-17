<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\RegionRequest;
use App\Models\City;
use App\Models\Region;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegionController extends Controller
{
    public function index() : View 
    {
        $regions  = Region::with('city')->get(); 

        return view('admin.pages.region.index',compact('regions'));
    } 
    public function create(): View 
    {    
        $cities  = City::get();

        return view('admin.pages.region.create',compact('cities'));
    }
    public function store(RegionRequest $request) : RedirectResponse
    {
        try {
            Region::create([ 
                'name' => [
                    'en' => $request->input("name.en"),
                    'ar' => $request->input("name.ar")
                ],  
                'city_id' => $request->input("city_id"),
            ]);

            return redirect()->route('admins.regions.index')->with('success','Region created successfully');
        } catch (Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function edit(Region $region)
    {
        $cities  = City::get(); 

        return view('admin.pages.region.edit',compact('cities','region'));
    }

    public function update(RegionRequest $request, Region $region) : RedirectResponse
    {
        try {

            $region->update([   
                'name' => [
                    'en' => $request->input("name.en"),
                    'ar' => $request->input("name.ar")
                ],
                'city_id' => $request->input("city_id"),
            ]);

            return redirect()->route('admins.regions.index')->with('success','Region updated successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function destroy(Region $region) : RedirectResponse 
    {
        try {

            if ($region->serviceProviders->count() > 0) {
                return redirect()->back()->with('error','can\'t delete, there are active service providers in this region');   
            }

            $region->delete();

            return redirect()->route('admins.regions.index')->with('success', 'region deleted successfully');
            $region->delete();

        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function stauts(Region $region) : RedirectResponse 
    {
        try {
            $region->update([   
                'active' => !$region->active
            ]);

            return redirect()->route('admins.regions.index');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back();//message
        }
    }
}