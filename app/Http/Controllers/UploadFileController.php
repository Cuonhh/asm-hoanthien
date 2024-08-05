<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function index(Request $request) {
        $request->validate([
            'upload' => 'required|image'
        ]);

        $path = $request->upload->store('images');
        $data = [
            'uploaded' => true,
            'fileName' => $path,
            'url' => asset($path)
        ];

        $url = asset($path);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $msg = 'Image successfully uploaded';
        $re = "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg ')</script>";

        // Render HTML output 
        return response($re, 200)->header('Content-Type', 'text/html');
    }
}
