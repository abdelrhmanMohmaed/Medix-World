<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\TermsRequest;
use App\Models\TermsCondition;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class TermsAndCondtionController extends Controller
{
    public function index()
    {
        $terms  = TermsCondition::get();

        return view('admin.pages.terms_and_conditions.index', compact('terms'));
    }

    public function create()
    {
        return view('admin.pages.terms_and_conditions.create');
    }

    public function store(TermsRequest $request)
    {
        try {
            TermsCondition::create([
                'user_id' => Auth::id() ?? 1,
                'title' => [
                    'en' => $request->input('title.en'),
                    'ar' => $request->input('title.ar'),
                ],
                'description' => [
                    'en' => $request->input('description.en'),
                    'ar' => $request->input('description.ar'),

                ],
                'sub_description' => [
                    'en' => $request->input('sub_description.en'),
                    'ar' => $request->input('sub_description.ar'),
                ],
            ]);

            return redirect()->route('admins.terms.index')->with('success', 'New Terms Created successfully');
        } catch (Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function show(TermsCondition $term)
    {
        return view('admin.pages.terms_and_conditions.details', compact('term'));
    }

    public function edit(TermsCondition $term)
    {
        return view('admin.pages.terms_and_conditions.edit', compact('term'));
    }

    public function update(TermsRequest $request, TermsCondition $term) 
    {
        try {
            $term->update([
                'title' => [
                    'en' => $request->input("title.en"),
                    'ar' => $request->input("title.ar")
                ],
                'sub_description' => [
                    'en' => $request->input("sub_description.en"),
                    'ar' => $request->input("sub_description.ar"),
                ],
                'description' => [
                    'en' => $request->input("description.en"),
                    'ar' => $request->input("description.ar"),
                ],
            ]);

            return redirect()->route('admins.terms.index')->with('success','Terms updated successfully');
        } catch (Exception $e) {
            
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function destroy(TermsCondition $term)
    {
        try {

            $term->delete();

            return redirect()->route('admins.terms.index')->with('success','Terms deleted successfully');
        } catch (Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function status(TermsCondition $term) : RedirectResponse 
    { 
        try { 

            $term->update([   
                'active' => !$term->active
            ]);

            return redirect()->route('admins.terms.index')->with('success','Terms status update successfully');
        } catch (Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }
}
