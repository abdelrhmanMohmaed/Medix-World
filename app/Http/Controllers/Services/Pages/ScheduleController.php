<?php

namespace App\Http\Controllers\Services\Pages;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index() : View 
    {        
        $today =  date('Y-m-d H:i:s', strtotime(Carbon::today()));
        $tomorrow = date('Y-m-d H:i:s', strtotime('+1 days', strtotime($today)));

        $schedules = Schedule::where('user_id',Auth::id())->get();
        $daySchedules = Schedule::where('user_id', Auth::id())
        ->where('start_time', '>=', $today)->where('end_time', '<', $tomorrow)
        ->orderBy('start_time', 'asc')->get();
// dd($schedules);
        return view('service.pages.schedules.index',compact('schedules','daySchedules'));    
    }  
        
    public function store(Request $request)  
    { 
        $from = Carbon::parse($request->input('from'));
        $to = Carbon::parse($request->input('to'));
        $duration = $request->input('duration');

        list($hours, $minutes) = explode(':', $duration);

        $durationInMinutes = $hours * 60 + $minutes;

        $currentStart = $from;
        while ($currentStart < $to) 
        { 
            $end = $currentStart->copy()->addMinutes($durationInMinutes);
            
            if ($end <= $to) { 
                Schedule::create([
                    'user_id' =>
                    4,
                    // Auth::id(),
                    'start_time' => $currentStart,
                    'end_time' => $end,
                ]);
            }
            
            $currentStart = $end; 
        }
        
        return redirect()->route('services.schedules.index');    
    }



          
}
