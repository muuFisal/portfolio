<?php

namespace App\Utils;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ImageManger
{
    public function uploadImage($path, $image, $disk = 'public')
    {
        $file_name = $this->generateImageName($image);
        $this->storeImageInLocale($image, $path, $file_name, $disk);
        return $path . '/' . $file_name;
    }

    public function uploadFile(string $path, UploadedFile $file, string $disk = 'public'): string
    {
        $fileName = $this->generateImageName($file);
        $this->storeImageInLocale($file, $path, $fileName, $disk);

        return $path . '/' . $fileName;
    }

    public function generateImageName($image)
    {
        return time() . '_' . uniqid() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
    }

    public function storeImageInLocale($image, $path, $file_name, $disk)
    {
        $image->storePubliclyAs($path, $file_name, $disk);
    }

    public function deleteImage($image): void
    {
        $this->deleteFile($image);
    }

    public function uploadMultiImage($path, $images, $disk = 'public')
    {
        $imagePaths = [];
        foreach ($images as $image) {
            $imageName = $this->generateImageName($image);
            $this->storeImageInLocale($image, $path, $imageName, $disk);
            $imagePaths[] = $path . '/' . $imageName;
        }
        return $imagePaths;
    }

    public function deleteFile(?string $path, string $disk = 'public'): void
    {
        if (blank($path)) {
            return;
        }

        if (Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
            return;
        }

        $publicPath = public_path($path);
        if (file_exists($publicPath)) {
            unlink($publicPath);
        }
    }

    public function url(?string $path, string $disk = 'public'): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        if (file_exists(public_path($path))) {
            return asset(ltrim($path, '/'));
        }

        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->url($path);
        }

        return asset(ltrim($path, '/'));
    }
}
