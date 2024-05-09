<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\ServiceProviderDetails;
use Exception;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    public function getRequest()
    {

        $service_provider_requests  = ServiceProviderDetails::NotApproved()->get();

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

    public function show(ServiceProviderDetails $service_provider)
    {
        return view('admin.pages.service_provider.details', compact('service_provider'));
    }

    public function update(ServiceProviderDetails $service_provider, Request $request)
    {
        try {
            $service_provider->update(['status' => $request->status]);


            return redirect()->route('admins.service_provider.requests');
        } catch (Exception $e) {

            dd($e->getMessage());
            return redirect()->back(); //message
        }
    }

    public function destroy(ServiceProviderDetails $service_provider)
    {
        // dd('ddd');
        try {
            $service_provider->phones?->delete();

            $service_provider->delete();

            return redirect()->route('admins.service_provider.index');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back();//message
        }
    }
}
