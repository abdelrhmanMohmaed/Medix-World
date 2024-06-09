<?php

namespace App\Http\Controllers\Services\Pages;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\MedicalDocument;
use App\Traits\UploadTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View; 
use Illuminate\Support\Facades\Auth; 
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PatientController extends Controller
{
    use UploadTrait;
    public function index() : View 
    {        
        $books = Book::with('client')->where('user_id',Auth::id())->get();

        return view('service.pages.patient.index',compact('books'));
    }      
    
    public function show($client_id) : View 
    {        
        $medicalDocument = MedicalDocument::with('client')->where('client_id',$client_id)
        ->where('major_id',Auth::user()->serviceProviderDetails->major_id)
        ->get();

        return view('service.pages.patient.show',compact('medicalDocument','client_id'));
    }  

    public function store(Request $request, $client_id)
    {
        try {
            $major_id = Auth::user()->serviceProviderDetails->major_id;
            $filePath = 'assets/files/user/mdeicalFiles/'. $client_id . '/' . $major_id . '/';
            $fileName =$this->handleFileUpload($request->file("file"), $filePath);

            MedicalDocument::create([

                'user_id'=> Auth::id(),
                'client_id'=> $client_id,
                'major_id'=> $major_id,
                'title'=> $request->input('title'),
                'description'=> $request->input('description'),
                'file'=>  $fileName
            ]);

            return redirect()->back()->with('success',__('website/web.success-medical-file'));
        } catch (Exception $e) {
            
            return redirect()->back()->with('wrong',__('website/web.wrong'));
        }
    }
    public function download(MedicalDocument $file): BinaryFileResponse
    {   
        if (!$file) {
            return abort(404);
        } 
        $filePath = public_path($file->file);
 
        if (file_exists($filePath)) { 
            
            return response()->download($filePath, $file->original_filename);
        }
 
        return abort(404);
    }
}
