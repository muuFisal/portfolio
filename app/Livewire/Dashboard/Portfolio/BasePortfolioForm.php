<?php

namespace App\Livewire\Dashboard\Portfolio;

use App\Livewire\Dashboard\Portfolio\Concerns\AuthorizesDashboardPermission;
use App\Livewire\Dashboard\Portfolio\Concerns\DispatchesDashboardNotifications;
use App\Livewire\Dashboard\Portfolio\Concerns\InteractsWithPortfolioTranslations;
use App\Utils\ImageManger;
use Illuminate\Http\UploadedFile;
use Livewire\Component;
use Livewire\WithFileUploads;

abstract class BasePortfolioForm extends Component
{
    use AuthorizesDashboardPermission;
    use DispatchesDashboardNotifications;
    use InteractsWithPortfolioTranslations;
    use WithFileUploads;

    protected ImageManger $imageManager;

    public function boot(ImageManger $imageManager): void
    {
        $this->imageManager = $imageManager;
    }

    protected function storeImage(mixed $file, ?string $currentPath, string $directory): ?string
    {
        if (! $file instanceof UploadedFile || ! $file->isValid()) {
            return $currentPath;
        }

        $this->imageManager->deleteImage($currentPath);

        return $this->imageManager->uploadImage($directory, $file, 'public');
    }

    protected function storeFile(mixed $file, ?string $currentPath, string $directory): ?string
    {
        if (! $file instanceof UploadedFile || ! $file->isValid()) {
            return $currentPath;
        }

        $this->imageManager->deleteFile($currentPath);

        return $this->imageManager->uploadFile($directory, $file, 'public');
    }
}
