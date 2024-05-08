<?php

namespace App\Http\Controllers\Services\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Services\Auth\RegisterRequest;
use App\Models\City;
use App\Models\Major;
use App\Models\Phone;
use App\Models\Region;
use App\Models\ServiceProviderDetails;
use App\Models\Title;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Traits\UploadTrait;
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
    use UploadTrait;
    public function create(): View
    {
        $majors = Major::active()->get();
        $titles = Title::active()->get();
        $cities = City::active()->get();

        return view('service.auth.register',
        compact(['majors','titles','cities'])
            );
    }
    public function axiosRegion($id) 
    {
        $regions = Region::whereCityId($id)->get();

        return view('service.auth.partials.regions',compact('regions'));
    }
    
    public function store(RegisterRequest $request): RedirectResponse
    {
        try {
            // dd($request->all());
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->input("name.en"),
                'email' => $request->input("email"),
                'password' => $request->input("password"),
                'dateOfBirth' => $request->input("dateOfBirth"),
                'gender' => $request->input("gender"),
            ]); 

            $avatarPath = 'assets/images/services/avatars/';
            $avatarName =$this->handleFileUpload($request->file("profileImage"), $avatarPath);
            $medicalCardPath = 'assets/images/services/medicalCard/';
            $medicalCardName =$this->handleFileUpload($request->file("medical_association_card"), $medicalCardPath);

            ServiceProviderDetails::create([
                'user_id' => $user->id,
                'city_id' => $request->input("city_id"),
                'region_id' => $request->input("region_id"),
                'title_id' => $request->input("title_id"),
                'major_id' => $request->input("major_id"),

                'name' => [
                        'en' => $request->input("name.en"),
                        'ar' => $request->input("name.ar")
                    ],
                'summary' => [
                        'en' => $request->input("summary.en"),
                        'ar' => $request->input("summary.ar")
                    ],
                'address' => [
                    'en' => $request->input("address.en"),
                    'ar' => $request->input("address.ar")
                ],
                'price' => $request->input("bookingPrice"),

                'img' => $avatarName,
                'medical_card' => $medicalCardName,
            ]);

            Phone::create([
                'user_id' => $user->id,
                'tel' => $request->input("clinicTel"),
                'active' => 1,
            ]);

            if ($request->has('clinicTelTwo')) { 
                if (!empty($request->input('clinicTelTwo'))) { 
                    
                    Phone::create([
                        'user_id' => $user->id,
                        'tel' => $request->input('clinicTelTwo'),
                        'active' => 1,
                    ]);
                }
            }

            $user->assignRole('Service Providers');
            event(new Registered($user));
            Auth::guard('service_provider')->login($user);

            DB::commit();

            return redirect()->intended(route('services.dashboard.index',app()->getLocale()));
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());  
            return redirect()->back();  
        }
    }
}
