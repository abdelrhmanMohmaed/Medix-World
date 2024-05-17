<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Traits\UploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\Admin\Pages\AdviceRequest;
use Exception;
use Illuminate\Support\Facades\File;

class AdviceController extends Controller
{
    use UploadTrait;
    
    public function index() : View  
    {
        $advices  = Advice::get(); 

        return view('admin.pages.advice.index',compact('advices'));
    } 

    public function create(): View 
    {    
        return view('admin.pages.advice.create');
    }

    public function store(AdviceRequest $request): RedirectResponse
    { 
        try {
            
            if ($request->hasFile('img')) 
            {
                $path = 'assets/images/advices/';
                $fileName = $this->handleFileUpload($request->file('img'),$path);
            }

            Advice::create([ 
                'user_id' => Auth::id() ?? 1,  
                'title' => [
                    'en' => $request->input('title.en'),
                    'ar' => $request->input('title.ar'),
                ],
                'description' => [
                    'title' => [
                        'en' => $request->input('description.en'),
                        'ar' => $request->input('description.ar'),
                    ],
                ],
                'img' => ($fileName)? $fileName : 'assets/images/advices/default.png',
            ]);

            return redirect()->route('admins.advices.index')->with('success','created successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function show(Advice $advice): View 
    {    
        return view('admin.pages.advice.details',compact('advice'));
    }

    public function edit(Advice $advice)
    {
        return view('admin.pages.advice.edit',compact('advice'));
    }

    public function update(AdviceRequest $request, Advice $advice) : RedirectResponse
    {
        try {
            $advice->update([
                'title' => [
                    'en' => $request->input("title.en"),
                    'ar' => $request->input("title.ar")
                ],
                'description' => [
                    'en' => $request->input("description.en"),
                    'ar' => $request->input("description.ar"),
                ],
                'img' => ($request->has('img') && $request->img != null) ? $request->img : 'assets/images/advices/default.png',
            ]);

            return redirect()->route('admins.advices.index')->with('success', 'advice updated successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function destroy(Advice $advice) : RedirectResponse 
    {
        try {
            if($advice->img !=  'assets/images/advices/default.png')
            {
            $img=File::delete($advice->img);
            }
            $advice->delete();
            return redirect()->route('admins.advices.index')->with('success','advice deleted successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function stauts(Advice $advice) : RedirectResponse 
    {
        try {
            $advice->update([   
                'active' => !$advice->active
            ]);

            return redirect()->route('admins.advices.index');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back();//message
        }
    }
}
