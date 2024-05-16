<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\UserRequest; 
use App\Http\Requests\Web\ReviewRequest; 
use App\Models\Phone;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\User;
use App\Traits\UploadTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\RedirectResponse; 
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use UploadTrait;
    public function index() : View 
    {    
        $query = User::query();
        $startOfDay = Carbon::now()->startOfDay();
        $endOfDay = Carbon::now()->endOfDay();

        $user = $query 
        ->with(['serviceProviderDetails.major','clientBook.clientReview','clientBook' => function ($q) { 

            $q->whereDoesntHave('clientReview');
        }])->whereId(Auth::id())->first();
        
        
        $booking = Schedule::whereHas('book', function ($q) {
            $q->where('client_id', Auth::id());
        })
        ->where('start_time', '>=', $startOfDay)
        ->where('end_time', '<=', $endOfDay)
        ->get();
        
        
        return view('web.pages.profile.index',compact('user','booking'));    
    } 
    public function update(UserRequest $request, User $user) : RedirectResponse
    {
        try {
            $user->update([
                'name' => $request->input("fullName"),
                'email' => $request->input("email"),
                'password' => $request->input("password"),
                'dateOfBirth' => $request->input("dateOfBirth"),
                'gender' => $request->input("gender"),            
            ]);
            
            Phone::updateOrCreate(['user_id' => $user->id],
            [
                    'type' => 'personal',
                    'tel' => $request->input("tel"), 
                    'active' => 1
                    ]);
            

            if ($request->has('telTwo')) { 
                if (!empty($request->input('telTwo'))) 
                { 
                    Phone::updateOrCreate(['user_id' => $user->id],
            [
                    'type' => 'personal',
                    'tel' => $request->input("tel"), 
                    'active' => 1
                    ]);
                }
            }

            
            return redirect()->back()->with('success',__('website/web.success-update-profile'));
        } catch (Exception $e) {

            return redirect()->back()->with('wrong',__('website/web.wrong'));
        }
    }    
    public function bookReview(ReviewRequest $request): RedirectResponse
    {
        try {

            Review::create([
                'user_id' => $request->input('user_id') ,
                'book_id' => $request->input('book_id') ,
                'client_id' => Auth::id(),
                'comment' => $request->input('comment') ,
                'rate' =>  $request->input('rating')
            ]);

            return redirect()->back()->with('success',__('website/web.success-book-reivew'));
        } catch (Exception $e) {
            
            return redirect()->back()->with('wrong',__('website/web.wrong'));
        }
    }
    
}
