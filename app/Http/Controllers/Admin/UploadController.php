<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'upload' => [
                    'required',
                    'image',
                    'mimes:jpeg,png,jpg,gif',
                ],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->validator->errors(),
            ], 422);
        }

        if ($request->hasFile('upload')) {

            $file = $request->file('upload');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $name = Str::slug(date('Y-m-d-h-i-s').'-'.pathinfo($originalName, PATHINFO_FILENAME));
            $image = Image::make($file);

            $imageString = $image->stream()->__toString();
            $name = "$name.$extension";

            Storage::disk('images')
                ->put('uploads/'.$name, $imageString);

            return response()->json([
                'url' => "/images/uploads/$name",
            ]);
        }

        return response()->json([
            'error' => 'No file was uploaded',
        ], 400);
    }
}
