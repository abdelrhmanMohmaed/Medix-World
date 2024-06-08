<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller; 
use App\Models\ContactUs;
use Illuminate\Http\RedirectResponse; 
use Illuminate\View\View; 
use Exception; 

class ContactUsController extends Controller
{ 
    public function index(): View
    {
        $messages  = ContactUs::get();

        return view('admin.pages.contact_us.index', compact('messages'));
    }

    public function show(ContactUs $message): View
    {
        return view('admin.pages.contact_us.details', compact('message'));
    }

    public function update(ContactUs $message): RedirectResponse
    {
        try {
            $message->update([
                'active' => ! $message->active,
            ]);

            return redirect()->route('admins.messages.index')->with('success', 'Message updated successfully');
        } catch (Exception $e) {
            
            return redirect()->back()->with('error', $e->getMessage()); //message
        }
    }

    public function destroy(ContactUs $message): RedirectResponse
    {
        try {
            $message->delete();

            return redirect()->route('admins.messages.index')->with('success', 'Message deleted successfully');
        } catch (Exception $e) {
            
            return redirect()->back()->with('error', $e->getMessage()); //message
        }
    }
}
