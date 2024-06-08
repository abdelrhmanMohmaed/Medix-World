<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Traits\UploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\Admin\Pages\AdviceRequest;
use App\Models\Book;
use Exception;
use Illuminate\Support\Facades\File;

class BookingController extends Controller
{
    use UploadTrait;
    
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
