<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\UserRequest;
use App\Traits\UploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Phone;
use App\Models\User;
use Exception;

class UserController extends Controller
{
    use UploadTrait;

    public function index(): View
    {
        $users = User::user()->get();

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
                'password' => '123456789',
                'tel' => $request->tel,
                'dateOfBirth' => $request->dateOfBirth,
                'gender' => $request->gender,
                'active' => true
            ]);

            $user->assignRole('User');

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
                'password' => $user->password,
                'tel' => $request->tel,
                'dateOfBirth' => $request->dateOfBirth,
                'gender' => $request->gender,
            ]);

            Phone::updateOrCreate([
                'user_id' => $user->id,
                'tel' => $request->tel
            ]);

            return redirect()->route('admins.users.index')->with('success', 'User updated successfully');
        } catch (Exception $e) {
            
            return redirect()->back()->with('error', $e->getMessage()); //message
        }
    }

    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->phones()->delete();
            $user->delete();

            return redirect()->route('admins.users.index')->with('success', 'User deleted successfully');
        } catch (Exception $e) { 

            return redirect()->back()->with('error', $e->getMessage()); //message
        }
    }

    public function status(User $user) : RedirectResponse 
    { 
        try { 

            $user->update([   
                'active' => !$user->active
            ]);

            return redirect()->route('admins.users.index')->with('success','User status update successfully');
        } catch (Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }
}
