<?php

namespace App\Traits;

// use Image;
// use Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
trait ImageProcessing
{
    /**
     * Get file extension based on MIME type.
     *
     * @param string $mime
     * @return string|null
     */
    public function get_mime($mime)
    {
        $extensions = [
            'image/jpeg' => '.jpg',
            'image/png' => '.png',
            'image/gif' => '.gif',
            'image/svg+xml' => '.svg',
            'image/tiff' => '.tiff',
            'image/webp' => '.webp',
        ];
        return $extensions[$mime] ?? null;
    }

    /**
     * Save an image to storage.
     *
     * @param mixed $image
     * @return string
     */
    public function saveImage($image, $imageAddress)
    {
        $img = Image::make($image );
        $extensions = $this->get_mime($img->mime());
        $str_random = Str::random(8);
        $imagePath = $str_random . time() . $extensions;
        $img->save(storage_path("app/{$imageAddress}/{$imagePath}"));
        return $imagePath;
    }

    /**
     * Resize an image while maintaining aspect ratio.
     *
     * @param mixed $image
     * @param int $width
     * @param int $height
     * @return string
     */
    public function aspectResize($image,$imageAddress, $width, $height)
    {
        $img = Image::make($image);
        $extensions = $this->get_mime($img->mime());
        $str_random = Str::random(8);

        $img->resize($width, $height, function ($constrain) {
            $constrain->aspectRatio();
        });

        $imagePath = $str_random . time() . $extensions;
        $img->save(storage_path("app/{$imageAddress}/{$imagePath}"));
        return $imagePath;
    }

    /**
     * Resize an image to a specific height while maintaining aspect ratio.
     *
     * @param mixed $image
     * @param int $width
     * @param int $height
     * @return string
     */
    public function aspectHeight($image, $imageAddress,$width, $height)
    {
        $img = Image::make($image);
        $extensions = $this->get_mime($img->mime());
        $str_random = Str::random(8);

        $img->resize(null, $height, function ($constrain) {
            $constrain->aspectRatio();
        });

        if ($img->width() < $width) {
            $img->resize($width, null);
        } else if ($img->width() > $width) {
            $img->crop($width, $height, 0, 0);
        }

        $imagePath = $str_random . time() . $extensions;
        $img->save(storage_path("app/{$imageAddress}/{$imagePath}"));
        return $imagePath;
    }

    /**
     * Save an image and generate thumbnails if required.
     *
     * @param mixed $Thefile
     * @param bool $thimb
     * @return array
     */
    public function saveImageAndThumbnail($Thefile, $thimb = false)
    {
        $dataX = [];
        $dataX['image'] = $this->saveImage($Thefile);

        if ($thimb) {
            $dataX['thumbnailsm'] = $this->aspectResize($Thefile, 256, 144);
            $dataX['thumbnailmd'] = $this->aspectResize($Thefile, 426, 240);
            $dataX['thumbnailxl'] = $this->aspectResize($Thefile, 640, 360);
        }

        return $dataX;
    }

    /**
     * Delete an image from storage.
     *
     * @param string $filePath
     * @return void
     */
    public function deleteImage($filePath, $diskName)
    {
        $imagePath = Storage::disk($diskName)->path($filePath);
    
        if (is_file($imagePath) && file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}