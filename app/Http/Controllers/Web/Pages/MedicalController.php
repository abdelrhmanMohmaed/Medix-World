<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\MedicalFileRequest;
use App\Models\MedicalDocument;
use App\Traits\UploadTrait;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class MedicalController extends Controller
{
    use UploadTrait;

    public function index($major) : View 
    {
        $files = MedicalDocument::with('serviceProvider','serviceProvider.serviceProviderDetails')
        ->where('major_id', $major)->where('client_id',Auth::id())->get();

        return view('web.pages.profile.partials.models.medicalFiles',compact('files')); 
    }   

    public function store(MedicalFileRequest $request) : RedirectResponse 
    {
        try {
            $filePath = 'assets/files/user/mdeicalFiles/'. Auth::id() . '/' . $request->input('major') . '/';
            $fileName =$this->handleFileUpload($request->file("file"), $filePath);

            MedicalDocument::create([

                'user_id'=> Auth::id(),
                'client_id'=> Auth::id(),
                'major_id'=> $request->input('major'),
                'title'=> $request->input('title'),
                'description'=> $request->input('description'),
                'file'=>  $fileName
            ]);

            return redirect()->back()->with('success',__('website/web.success-medical-file'));
        } catch (Exception $e) {
            
            return redirect()->back()->with('wrong',__('website/web.wrong'));
        }
    }
    public function update(Request $request)
    {
        $mdeical = MedicalDocument::whereId($request->file_id)->first();
        
        if (!$mdeical) {
            return redirect()->back()->with('error', __('website/web.wrong'));
        }

        if ($request->hasFile('file')) {
            
            $filePath = public_path($mdeical->file);

            if (file_exists($filePath)) { 
                unlink($filePath); 
            }

            $filePath = 'assets/files/user/medicalFiles/' . Auth::id() . '/' . $request->input('major') . '/';
            $fileName = $this->handleFileUpload($request->file("file"), $filePath);

            if ($fileName) {
                $mdeical->update(['file' => $fileName]);
            }
        } 

        $mdeical->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', __('website/web.success-medical-update'));
    } 
    public function destroy(Request $request): RedirectResponse
    {
        $file = MedicalDocument::find($request->file_id);
    
        if (!$file) {
            return redirect()->back()->with('wrong',  __('website/web.wrong'));
        }

        $filePath = public_path($file->file);

        if (file_exists($filePath)) { 
            unlink($filePath); 
        }
        $file->delete();

        return redirect()->back()->with('success', __('website/web.success-medical-delete'));
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
