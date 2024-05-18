<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\UserRequest;
use App\Models\Advice;
use App\Models\ContactUs;
use App\Traits\UploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Phone;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;

class ContactUsController extends Controller
{
    use UploadTrait;

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

            return redirect()->route('admins.messages.index')->with('success', 'message updated successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage()); //message
        }
    }

    public function destroy(ContactUs $message): RedirectResponse
    {
        try {
            $message->delete();
            return redirect()->route('admins.messages.index')->with('success', 'message deleted successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage()); //message
        }
    }
}
