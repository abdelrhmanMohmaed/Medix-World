<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\CityRequest;
use App\Models\City;
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

            return redirect()->route('admins.cities.index');
        } catch (Exception $e) {

            return redirect()->back();//message
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

            return redirect()->route('admins.cities.index');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back();//message
        }
    }

    public function destroy(City $city) : RedirectResponse 
    {
        try {
            $city->delete();

            return redirect()->route('admins.cities.index');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back();//message
        }
    }

    public function stauts(City $city) : RedirectResponse 
    {dd('ddddd');
        try {
            $city->update([   
                'active' => !$city->active
            ]);

            return redirect()->route('admins.cities.index');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back();//message
        }
    }
}
