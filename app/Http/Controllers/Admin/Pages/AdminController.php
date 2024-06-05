<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\UserRequest;
use App\Models\Advice;
use App\Traits\UploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Phone;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    use UploadTrait;

    public function index(): View
    {
        $admins  = User::admin()->get();

        return view('admin.pages.admin.index', compact('admins'));
    }

    public function create(): View
    {
        return view('admin.pages.admin.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        try {

            $admin = User::create([
                'name' => $request->fullName,
                'email' => $request->email,
                'password' => '123456',
                'tel' => $request->tel,
                'dateOfBirth' => $request->dateOfBirth,
                'gender' => $request->gender,
                'active' => $request->active
            ]);
// dd(Role::all());
            // $admin->assignRole('Admin','web');

            Phone::create([
                'user_id' => $admin->id,
                'tel' => $request->tel
            ]);

            return redirect()->route('admins.admins.index')->with('success', 'created successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage()); //message
        }
    }

    public function show(User $user): View
    {
        return view('admin.pages.admin.details', compact('user'));
    }

    public function edit(User $user)
    {
        // dd($user->phones->first()?->tel);
        return view('admin.pages.admin.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        try {
            $user->update([
                'name' => $request->fullName,
                'email' => $request->email,
                'password' => '123456',
                'tel' => $request->tel,
                'dateOfBirth' => $request->dateOfBirth,
                'gender' => $request->gender,
                'active' => $request->active
            ]);
            Phone::updateOrCreate([
                'user_id' => $user->id,
                'tel' => $request->tel
            ]);
            return redirect()->route('admins.admins.index')->with('success', 'Admin updated successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage()); //message
        }
    }

    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->phones()->delete();
            $user->delete();
            return redirect()->route('admins.admins.index')->with('success', 'Admin deleted successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage()); //message
        }
    }
}
