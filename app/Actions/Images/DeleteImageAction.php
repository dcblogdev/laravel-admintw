<?php

declare(strict_types=1);

namespace App\Actions\Images;

use Illuminate\Support\Facades\Storage;

class DeleteImageAction
{
    public function __invoke(string $path, string $disk = 'public'): void
    {
        Storage::disk($disk)->delete($path);
    }
}
