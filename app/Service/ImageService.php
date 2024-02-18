<?php

namespace App\Service;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    private string $path = 'app/public/logos';
    private string $name = 'logo';

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function storageImage(UploadedFile $file): string
    {
        $imageName = time() . '.' . $file->extension();
        $file->move(storage_path($this->path), $imageName);

        return $imageName;
    }

    /**
     * @param string $name
     * @throws \Exception
     */
    public function deleteImage(string $name): void
    {
        $filePath = $this->path . '/' . $name;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
    }
}
