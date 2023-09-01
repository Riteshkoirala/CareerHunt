<?php

namespace App\Http\Services;

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
