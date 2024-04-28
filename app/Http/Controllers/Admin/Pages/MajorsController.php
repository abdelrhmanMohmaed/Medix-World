<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\MajorRequest;
use App\Models\Major;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MajorsController extends Controller
{
    public function index() : View
    {
        $majors  = Major::get(); 

        return view('admin.pages.major.index',compact('majors'));
    } 
    public function create(): View 
    {    
        return view('admin.pages.major.create');
    }
    public function store(MajorRequest $request): RedirectResponse 
    {
        try {

            Major::create([   
                'name' => [
                    'en' => $request->input("name.en"),
                    'ar' => $request->input("name.ar")
                    ],
            ]);
            
            return redirect()->route('admins.majors.index');
            
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back();//message
        }
    }

    public function edit(Major $major) : View
    { 
        return view('admin.pages.major.edit',compact('major'));
    }
    
    public function update(MajorRequest $request, Major $major) : RedirectResponse
    {
        try {

            $major->update([   
                'name' => [
                    'en' => $request->input("name.en"),
                    'ar' => $request->input("name.ar")
                ],
            ]);

            return redirect()->route('admins.majors.index');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back();//message
        }
    }
    
    public function destroy(Major $major) : RedirectResponse 
    {
        try {
            $major->delete();

            return redirect()->route('admins.majors.index');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back();//message
        }
    }

    public function stauts(Major $major) : RedirectResponse 
    {
        try {
            $major->update([   
                'active' => !$major->active
            ]);

            return redirect()->route('admins.majors.index');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back();//message
        }
    }
}
