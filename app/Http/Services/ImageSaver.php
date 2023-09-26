<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

class ImageSaver
{

    public function imageHelp($request, $path)
    {
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $filename = now().$filename;
        $file->move(public_path($path), $filename);

        return $filename;
    }
}
