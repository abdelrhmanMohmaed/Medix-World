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

            return redirect()->back();
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back();//message
        }
    }
}
