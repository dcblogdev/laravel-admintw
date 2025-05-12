<?php

declare(strict_types=1);

namespace App\Actions\Images;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ResizeImageAction
{
    public function __invoke(string|TemporaryUploadedFile|UploadedFile $image, int $width = 800, ?int $height = null): string
    {
        $manager = new ImageManager(new Driver);

        return $manager
            ->read($image)
            ->scale(width: $width, height: $height)
            ->encode()
            ->toString();
    }
}
