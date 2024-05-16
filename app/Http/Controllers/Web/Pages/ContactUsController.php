<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ContactUsRequest;
use App\Models\ContactUs;
use Exception;
use Illuminate\Http\RedirectResponse; 

class ContactUsController extends Controller
{
    public function store(ContactUsRequest $request) : RedirectResponse
    {
        try {
            ContactUs::create([   
                "name" => $request->input("fullName"),
                "email" => $request->input("email"),
                "subject" => $request->input("subject"),
                "message" => $request->input("message"),
            ]);

            return redirect()->back()->with('success',__('website/web.success-contact-us'));
        } catch (Exception $e) {
            
            return redirect()->back()->with('wrong',__('website/web.wrong'));
        }
    }
}
