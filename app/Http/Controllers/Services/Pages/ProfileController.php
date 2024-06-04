<?php

namespace App\Http\Controllers\Services\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Services\Auth\RegisterRequest;
use App\Models\Phone;
use App\Models\Title;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index() : View 
    { 
        $authenticatedUser = Auth::guard('service_provider')->user();
        $service = $authenticatedUser->load(['serviceProviderDetails','activeReview' => function($query) {

            $query->orderBy('created_at', 'desc');
        }]);
    
        return view('service.pages.profile.index',compact('service'));    
    }
    
    public function edit(User $service) : View 
    {
        $titles = Title::get();
        $service->load(['serviceProviderDetails','activeReview']);

        return view('service.pages.profile.edit',compact('service','titles'));  
    }
    public function update(RegisterRequest $request, $id): RedirectResponse
    {
        try {
            DB::beginTransaction();
    
            $user = User::findOrFail($id);
    
            $user->update([
                'name' => $request->input("name.en"),
                'email' => $request->input("email"),
                'password' => $request->input("password"),
                'dateOfBirth' => $request->input("dateOfBirth"),
                'gender' => $request->input("gender"),
            ]);
    
            $avatarPath = 'assets/images/services/avatars/';
            $avatarName = $user->serviceProviderDetails->img;  
            if ($request->hasFile("profileImage")) {
                $avatarName = $this->handleFileUpload($request->file("profileImage"), $avatarPath);
            }
    
            $medicalCardPath = 'assets/images/services/medicalCard/';
            $medicalCardName = $user->serviceProviderDetails->medical_card;  
            if ($request->hasFile("medical_association_card")) {
                $medicalCardName = $this->handleFileUpload($request->file("medical_association_card"), $medicalCardPath);
            }
    
            $user->serviceProviderDetails->update([
                'city_id' => $request->input("city_id"),
                'region_id' => $request->input("region_id"),
                'title_id' => $request->input("title_id"),
                'major_id' => $request->input("major_id"),
                'name' => [
                    'en' => $request->input("name.en"),
                    'ar' => $request->input("name.ar"),
                ],
                'summary' => [
                    'en' => $request->input("summary.en"),
                    'ar' => $request->input("summary.ar"),
                ],
                'address' => [
                    'en' => $request->input("address.en"),
                    'ar' => $request->input("address.ar"),
                ],
                'price' => $request->input("bookingPrice"),
                'img' => $avatarName,
                'medical_card' => $medicalCardName,
            ]);
    
            // Update phones
            $phones = [
                ['type' => 'personal', 'tel' => $request->input('tel')],
                ['type' => 'clinic', 'tel' => $request->input('clinicTel')],
            ];
            
            if ($request->has('telTwo') && !empty($request->input('telTwo'))) {
                $phones[] = ['type' => 'personal', 'tel' => $request->input('telTwo')];
            }
    
            if ($request->has('clinicTelTwo') && !empty($request->input('clinicTelTwo'))) {
                $phones[] = ['type' => 'clinic', 'tel' => $request->input('clinicTelTwo')];
            }
    
            // Delete existing phones and create new ones
            Phone::where('user_id', $user->id)->delete();
            foreach ($phones as $phoneData) {
                Phone::create([
                    'type' => $phoneData['type'],
                    'user_id' => $user->id,
                    'tel' => $phoneData['tel'],
                    'active' => 1,
                ]);
            }
    
            DB::commit();
    
            return redirect()->intended(route('services.dashboard.index', app()->getLocale()));
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back();
        }
    }
    
}
