<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\ServiceProviderRequest;
use App\Models\City;
use App\Models\Major;
use App\Models\ServiceProviderDetails;
use App\Models\Title;
use App\Models\User;
use App\Traits\UploadTrait;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceProviderController extends Controller
{
    use UploadTrait;

    public function getRequest(Request $request)
    {

        $service_provider_requests  = ServiceProviderDetails::status($request->status)->get();

        return view('admin.pages.service_provider.request_index', compact('service_provider_requests'));
    }

    public function showRequest(ServiceProviderDetails $service_provider)
    {
        return view('admin.pages.service_provider.request_details', compact('service_provider'));
    }

    public function index()
    {
        $service_providers  = ServiceProviderDetails::approved()->get();

        return view('admin.pages.service_provider.index', compact('service_providers'));
    }

    public function create()
    {
        $cities = City::active()->get();

        $titles = Title::active()->get();

        $majors = Major::active()->get();

        return view('admin.pages.service_provider.create', compact('cities', 'titles', 'majors'));
    }


    public function store(ServiceProviderRequest $request)
    {
        try {
            DB::beginTransaction();

            $avatarPath = 'assets/images/services/avatars/';
            $avatarName = $this->handleFileUpload($request->file("profileImage"), $avatarPath);
            $medicalCardPath = 'assets/images/services/medicalCard/';
            $medicalCardName = $this->handleFileUpload($request->file("medical_association_card"), $medicalCardPath);


            $user = User::create([
                'name' => $request->input("name.en"),
                'email' => $request->input("email"),
                'password' => '123456',
                'dateOfBirth' => $request->input("dateOfBirth"),
                'gender' => $request->input("gender"),
            ]);
            // dd($user);
            $service_provider = $user->serviceProviderDetails()->create([
                'city_id' => $request->input("city_id"),
                'region_id' => $request->input("region_id"),
                'title_id' => $request->input("title_id"),
                'major_id' => $request->input("major_id"),
                'status' => "Approval",
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
                // 'tel' => $request->input("tel"),

                'img' => $avatarName,
                'medical_card' => $medicalCardName,
            ]);
        
            
            $user->phones()->create([
                'tel' => $request->input("tel"),
                'type' => 'personal',
                'active' => 1,
            ]);
            if (isset($request['telTwo']) && $request['telTwo'] != null) {
                $user->phones()->create([
                    'tel' => $request->input("telTwo"),
                    'type' => 'personal',
                    'active' => 1,
                ]);
            }

            $user->phones()->create([
                'tel' => $request->input("clinicTel"),
                'type' => 'clinic',
                'active' => 1,
            ]);

            if (isset($request['clinicTelTwo']) && $request['clinicTelTwo'] != null) {
                $user->phones()->create([
                    'tel' => $request->input("clinicTelTwo"),
                    'type' => 'clinic',
                    'active' => 1,
                ]);
            }
            $user->assignRole('Service Providers','web');
           
            DB::commit();
            return redirect()->route('admins.service_provider.index')->with('success', 'Service Provider created successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());

            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function show(ServiceProviderDetails $service_provider)
    {
        return view('admin.pages.service_provider.details', compact('service_provider'));
    }

    public function update(ServiceProviderDetails $service_provider, Request $request)
    {
        try {
            $service_provider->update(['status' => $request->status]);


            return redirect()->route('admins.service_provider.requests')->with('success','request updated successfully');
        } catch (Exception $e) {

            // dd($e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }

    public function destroy(ServiceProviderDetails $service_provider)
    {
        // dd('ddd');
        try {
            $service_provider->phones?->delete();

            $service_provider->delete();

            return redirect()->back()->with('success','request deleted successfully');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());//message
        }
    }
}
