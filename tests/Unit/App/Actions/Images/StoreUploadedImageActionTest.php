<?php

declare(strict_types=1);

use App\Actions\Images\ResizeImageAction;
use App\Actions\Images\StoreUploadedImageAction;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

test('can store image', function () {

    Storage::fake();

    $mockResizeImageAction = Mockery::mock(ResizeImageAction::class);

    $this->app->instance(ResizeImageAction::class, $mockResizeImageAction);

    $mockResizeImageAction
        ->shouldReceive('__invoke')
        ->once()
        ->with(Mockery::type(TemporaryUploadedFile::class), 800, null)
        ->andReturn('users/new.jpg');

    $image = File::create('2022-07-13.jpg');
    $temporaryUploadedFile = new TemporaryUploadedFile($image, 'public');

    $newPath = app(StoreUploadedImageAction::class)($temporaryUploadedFile, 'my-cool-folder');

    Storage::disk('public')->assertExists($newPath);

    expect($newPath)
        ->toContain('my-cool-folder')
        ->toContain('.jpg');

    Storage::disk('public')->delete($newPath);
});
