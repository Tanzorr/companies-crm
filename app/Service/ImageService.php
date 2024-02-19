<?php

namespace App\Service;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ImageService
{

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function storageImage(UploadedFile $file, string $storagePath): string
    {
        $imageName = time() . '.' . $file->extension();
        $file->move(storage_path($storagePath), $imageName);

        return $imageName;
    }

    /**
     * @param string $name
     * @throws \Exception
     */
    public function deleteImage(string $name, string $storagePath): void
    {
        $filePath = storage_path("$storagePath/$name");

        if (File::exists($filePath)) {
            File::delete($filePath);
        }
    }
}
