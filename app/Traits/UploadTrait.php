<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

trait UploadTrait
{
    public function handleFileUpload($file, $path)
    {
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $fileName);

        return $fileName; 
    }
}
