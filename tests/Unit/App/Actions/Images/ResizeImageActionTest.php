<?php

declare(strict_types=1);

use App\Actions\Images\ResizeImageAction;
use Illuminate\Http\Testing\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

it('can resize an image', function () {

    // Ensure storage path for testing exists
    $tempPath = storage_path('framework/testing/test.jpg');

    // Copy the real image to the testing directory
    copy(base_path('tests/Fixtures/test.jpg'), $tempPath);

    // Simulate uploaded file
    $file = new UploadedFile(
        $tempPath,
        'test.jpg',
        'image/jpeg',
        null,
        true
    );

    // Perform the resize action directly
    $action = new ResizeImageAction;
    $result = $action($file, 200);  // Resize to 200x200

    // Verify the resized image
    $manager = new ImageManager(new Driver);
    $resizedImage = $manager->read($result);

    expect($resizedImage->width())->toBe(200);

    unlink($tempPath);
});
