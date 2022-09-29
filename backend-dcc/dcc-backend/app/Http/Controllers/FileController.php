<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class FileController extends Controller
{
    public function upload(Request $request)
    {
        $path = $request->file('image')->store('images');

        return [
            "result" => $path,
            "message" => "Image is stored under storage->app->images folder!"
        ];
    }
}