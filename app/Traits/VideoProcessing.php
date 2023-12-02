<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
trait VideoProcessing
{
    public function deleteVideo($filename, $directory)
    {
        $storagePath = storage_path('app/' . $directory . '/' . $filename);
        $publicPath = public_path($directory . '/' . $filename);

        if (Storage::exists($storagePath)) {
            Storage::delete($storagePath);
        }

        if (file_exists($publicPath)) {
            unlink($publicPath);
        }
    }
}