<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller; 
use Illuminate\View\View; 
use App\Models\Book; 

class BookingController extends Controller
{ 
    
    public function index() : View  
    {
        $bookings  = Book::get(); 

        return view('admin.pages.booking.index',compact('bookings'));
    } 

    public function show(Book $booking): View 
    {    
        return view('admin.pages.booking.details',compact('booking'));
    }
}
