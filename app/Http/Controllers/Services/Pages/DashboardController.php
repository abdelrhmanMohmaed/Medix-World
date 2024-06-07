<?php

namespace App\Http\Controllers\Services\Pages;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index() : View
    { 
        $userId = Auth::id();
        $totalBooking = Book::where('user_id', $userId)->count();
        $totalSchedules = Schedule::with('book')->where('user_id', $userId)->count();

        $today =  date('Y-m-d H:i:s', strtotime(Carbon::today()));
        $tomorrow = date('Y-m-d H:i:s', strtotime('+1 days', strtotime($today))); 
        $nextTomorrow = date('Y-m-d H:i:s', strtotime('+2 days', strtotime($today))); 
        $totalTodaySchedules = Schedule::with('book')->where('user_id', Auth::id())
        ->where('start_time', '>=', $today)->where('end_time', '<', $tomorrow)
        ->orderBy('start_time', 'asc')->get();


        $totalTomorrowSchedules = Schedule::with('book')->where('user_id', Auth::id())
        ->where('start_time', '>=', $tomorrow)->where('end_time', '<', $nextTomorrow)
        ->orderBy('start_time', 'asc')->get();


        $dayBookingCount = $totalTodaySchedules->whereNotNull('book')->count();
        $totalTomorrowSchedulesBooking = $totalTomorrowSchedules->whereNotNull('book')->count();
        $totalTodaySchedules->count();




        return view('service.pages.dashboard.index', compact(
            'totalBooking', 'totalSchedules','totalTodaySchedules',
            'totalTomorrowSchedulesBooking','dayBookingCount'
        ));
    }

}
