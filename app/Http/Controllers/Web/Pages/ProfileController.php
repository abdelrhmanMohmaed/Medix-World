<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ReviewRequest;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index() : View 
    {    
        $query = User::query();

        $user = $query 
        ->with(['clientBook.clientReview','clientBook' => function ($q) { 

            $q->whereDoesntHave('clientReview');
        }])->whereId(Auth::id())->first();
        
        return view('web.pages.profile.index',compact('user'));    
    } 

    public function bookReview(ReviewRequest $request)  
    {

        try {

            Review::create([
                'user_id' => $request->input('user_id') ,
                'book_id' => $request->input('book_id') ,
                'client_id' => Auth::id(),
                'comment' => $request->input('comment') ,
                'rate' =>  $request->input('rating')
            ]);


            return redirect()->back();
        } catch (Exception $e) {
            
        }
    }
}
