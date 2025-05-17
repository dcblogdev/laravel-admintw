<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\UploadController;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\postJson;

beforeEach(function () {
    Storage::fake('images');
    $this->user = $this->authenticate();
});

test('uploads an image successfully', function () {
    $file = UploadedFile::fake()->image('example.jpg');

    postJson(route('image-upload'), [
        'upload' => $file,
    ])
        ->assertStatus(200)
        ->assertJsonStructure(['url']);
});

test('fails when no file is uploaded', function () {
    postJson(route('image-upload'), [])->assertStatus(422);
});

test('fails when file is not an image', function () {
    $file = UploadedFile::fake()->create('example.txt', 10, 'text/plain');

    postJson(route('image-upload'), [
        'upload' => $file,
    ])->assertStatus(422);
});

test('returns 400 when uploaded file is not an instance of UploadedFile', function () {
    $mockRequest = Mockery::mock(Request::class);

    $mockRequest->shouldReceive('validate')->andReturn(['upload' => 'not-a-file']);
    $mockRequest->shouldReceive('hasFile')->once()->with('upload')->andReturn(true);
    $mockRequest->shouldReceive('file')->once()->with('upload')->andReturn('not-a-file-object');

    $controller = new UploadController;

    $response = $controller($mockRequest);

    expect($response->getStatusCode())->toBe(400);
    expect($response->getData(true)['error'])->toBe('Invalid upload');
});

test('returns 422 when upload is present but hasFile returns false', function () {
    $mockRequest = Mockery::mock(Request::class);
    $mockRequest->shouldReceive('validate')->andReturn(['upload' => 'not-a-real-file']);
    $mockRequest->shouldReceive('hasFile')->once()->with('upload')->andReturn(false);

    $controller = new UploadController;

    $response = $controller($mockRequest);

    expect($response->getStatusCode())->toBe(422);
    expect($response->getData(true)['error'])->toBe('No file uploaded');
});
