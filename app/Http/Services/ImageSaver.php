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
    public function imageStore($data, string $path)
    {
        $base64_str = substr($data['cropped_image_name'], strpos($data['cropped_image_name'], ",") + 1);
        $extension = explode('/', mime_content_type($data['cropped_image_name']))[1];
        $imageName = now()->format('d-m-Y-H-i-s'). '.' . $extension;

        Storage::disk($path)->put($imageName, base64_decode($base64_str));

        return $imageName;
    }
}
