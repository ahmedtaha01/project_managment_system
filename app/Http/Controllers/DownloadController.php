<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($fileName){
        return response()->download(public_path('attachments\\'.$fileName));
    }
}
