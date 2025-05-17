<?php

declare(strict_types=1);

namespace App\Actions\Images;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class StoreUploadedImageAction
{
    public function __invoke(TemporaryUploadedFile|UploadedFile $image, string $destinationFolder, string $disk = 'public', int $width = 800, ?int $height = null): string
    {
        $name = md5(random_int(1, 10).microtime()).'.jpg';
        $img = app(ResizeImageAction::class)($image, $width, $height);

        $destinationFolder = mb_rtrim($destinationFolder, DIRECTORY_SEPARATOR);

        Storage::disk($disk)->put($destinationFolder.DIRECTORY_SEPARATOR.$name, $img);

        return $destinationFolder.DIRECTORY_SEPARATOR.$name;
    }
}
