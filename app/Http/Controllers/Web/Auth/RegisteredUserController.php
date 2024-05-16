<?php


namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\RegisterRequest;
use App\Models\Phone;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{ 
    public function create(): View
    {
        return view('web.auth.register');
    }
   
    public function store(RegisterRequest $request): RedirectResponse
    { 
        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->fullName,
                'email' => $request->email,
                'password' => $request->password,
                'dateOfBirth' => $request->dateOfBirth,
                'gender' => $request->gender,
            ]); 
            $user->assignRole('User');

            Phone::create([

                    'user_id' => $user->id,
                    'type' => 'personal',
                    'tel' => $request->input("tel"), 
                    'active' => 1
            ]);
            

            if ($request->has('telTwo')) { 
                if (!empty($request->input('telTwo'))) 
                { 
                    Phone::create([

                        'user_id' => $user->id,
                        'type' => 'personal',
                        'tel' => $request->input("tel"), 
                        'active' => 1
                    ]);
                }
            }

            event(new Registered($user));
            Auth::guard('web')->login($user);

            DB::commit();

            return redirect()->intended(route('website.welcome', app()->getLocale()))->with('success',__('website/web.success-register'));
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());  
            return redirect()->back();  
        }
    }
}
