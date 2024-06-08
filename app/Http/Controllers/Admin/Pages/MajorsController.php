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
    public function index(): View
    {
        $majors  = Major::get();

        return view('admin.pages.major.index', compact('majors'));
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

            return redirect()->route('admins.majors.index')->with("success", "Major created successfully");
        } catch (Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function edit(Major $major): View
    {
        return view('admin.pages.major.edit', compact('major'));
    }

    public function update(MajorRequest $request, Major $major): RedirectResponse
    {
        try {

            $major->update([
                'name' => [
                    'en' => $request->input("name.en"),
                    'ar' => $request->input("name.ar")
                ],
            ]);

            return redirect()->route('admins.majors.index')->with("success", "Major updated successfully");
        } catch (Exception $e) {
            
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function destroy(Major $major): RedirectResponse
    {
        try {
            if ($major->serviceProviders->count() > 0) {
                return redirect()->back()->with('error','Can\'t delete, there are active service providers in this major');   
            }

            $major->delete();

            return redirect()->route('admins.majors.index')->with('success', 'Major deleted successfully');
        } catch (Exception $e) {
            
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function status(Major $major): RedirectResponse
    {
        try {
            $major->update([
                'active' => !$major->active
            ]);

            return redirect()->route('admins.majors.index');
        } catch (Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }
}
