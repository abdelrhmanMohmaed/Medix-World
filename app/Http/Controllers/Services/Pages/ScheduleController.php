<?php

namespace App\Http\Controllers\Services\Pages;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ScheduleController extends Controller
{
    public function index() : View 
    {        
        $today =  date('Y-m-d H:i:s', strtotime(Carbon::today()));
        $tomorrow = date('Y-m-d H:i:s', strtotime('+1 days', strtotime($today)));

        $schedules = Schedule::with('book')->where('user_id',Auth::id())->get();
        $daySchedules = Schedule::with('book')->where('user_id', Auth::id())
        ->where('start_time', '>=', $today)->where('end_time', '<', $tomorrow)
        ->orderBy('start_time', 'asc')->get();

        return view('service.pages.schedules.index',compact('schedules','daySchedules'));    
    }  
        
    public function store(Request $request) : RedirectResponse
    { 
        $from = Carbon::parse($request->input('from'));
        $to = Carbon::parse($request->input('to'));
        $duration = $request->input('duration');
    
        list($hours, $minutes) = explode(':', $duration);
        $durationInMinutes = $hours * 60 + $minutes;
    
        $currentStart = $from;
        try {
            while ($currentStart < $to) 
            { 
                $end = $currentStart->copy()->addMinutes($durationInMinutes);

                if ($end <= $to) 
                { 
                    $overlap = Schedule::where('user_id', Auth::id())
                        ->where(function ($query) use ($currentStart, $end) {
                            $query->whereBetween('start_time', [$currentStart, $end])
                                ->orWhereBetween('end_time', [$currentStart, $end])
                                ->orWhere(function ($query) use ($currentStart, $end) {
                                    $query->where('start_time', '<', $currentStart)
                                            ->where('end_time', '>', $end);
                            });
                        })
                        ->exists();

                    if (!$overlap) 
                    {
                        Schedule::create([
                            'user_id' => Auth::id(),
                            'start_time' => $currentStart,
                            'end_time' => $end,
                        ]);
                    }
                }

                $currentStart = $end; 
            }
        
            return redirect()->back()->with('success','You Schedule added Successfully');     
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error','Something is wrong please try again or contact medix service provider'); 
        }
    }
    public function destroy(Request $request) : RedirectResponse
    {
        try {
            $schedule = Schedule::findOrFail($request->schedule_id);
            $schedule->delete();

            return redirect()->back()->with('success', 'Your schedule has been successfully deleted.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Schedule not found. Please try again.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again or contact the service provider.');
        }
    }
}
