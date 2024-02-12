<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class MediaStorage
{
    public function execute($request, Post $post,string $filePath):void
    {
        $image           = $request;
        $filename        = Str::slug($post->title) . '.' . $image->getClientOriginalExtension();
        $img = Image::make($image->path());
        $path = storage_path('app/public/'.$filePath);
        if(!file_exists($path)) {
            mkdir($path);
        }
        $img->save(storage_path('app/public/'.$filePath.$filename), 60);
        $post->thumbnail = $filename;
    }
}
