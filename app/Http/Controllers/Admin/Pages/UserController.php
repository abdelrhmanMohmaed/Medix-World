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

class UserController extends Controller
{
    use UploadTrait;

    public function index(): View
    {
        $users  = User::user()->get();

        return view('admin.pages.user.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.pages.user.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        try {

            $user = User::create([
                'name' => $request->fullName,
                'email' => $request->email,
                'password' => '123456',
                'tel' => $request->tel,
                'dateOfBirth' => $request->dateOfBirth,
                'gender' => $request->gender,
            ]);

            // $user->assignRole('User', 'web');

            Phone::create([
                'user_id' => $user->id,
                'tel' => $request->tel
            ]);

            return redirect()->route('admins.users.index')->with('success', 'created successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage()); //message
        }
    }

    public function show(User $user): View
    {
        return view('admin.pages.user.details', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.pages.user.edit', compact('user'));
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
            ]);

            return redirect()->route('admins.users.index')->with('success', 'user updated successfully');
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
            return redirect()->route('admins.users.index')->with('success', 'user deleted successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage()); //message
        }
    }
}
