<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Models\Book;
use App\Models\City;
use App\Models\Major;
use App\Models\ServiceProviderDetails;
use App\Models\User;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index() : View
    {
        $all_users = User::user()->get();
        $active_users = User::user()->active()->get();
        $inactive_users = User::user()->inactive()->get();

        $all_service_providers = User::serviceProvider()->get();
        $active_service_providers = User::serviceProvider()->active()->get();
        $inactive_service_providers = User::serviceProvider()->inactive()->get();
 
        $requestPending = ServiceProviderDetails::where('status','Pending')->count();
        $requestReject = ServiceProviderDetails::where('status','Reject')->count(); 
        $requestApproval = ServiceProviderDetails::where('status','Approval')->count(); 

        $all_majors = Major::get();
        $active_majors = Major::active()->get();
        $inactive_majors = Major::inactive()->get();

        $all_cities = City::get();
        $active_cities = City::active()->get();
        $inactive_cities = City::inactive()->get();

        $all_advices = Advice::get();
        $active_advices = Advice::active()->get();
        $inactive_advices = Advice::inactive()->get();


        $books = Book::get();
        return view('admin.dashboard',
        compact('all_users','active_users','inactive_users',
        'all_service_providers','active_service_providers','inactive_service_providers',
        'all_majors','active_majors','inactive_majors',
        'all_cities','active_cities','inactive_cities',
        'all_advices','active_advices','inactive_advices',
        'requestApproval','requestPending','requestReject',
        'books'));    
    }
}
