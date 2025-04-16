<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'upload' => [
                'required',
                'file',
                'image',
                'mimes:jpeg,png,jpg,gif',
            ],
        ]);

        if ($request->hasFile('upload')) {

            $file = $request->file('upload');

            if (is_array($file)) {
                $file = $file[0];
            }

            if (! $file instanceof UploadedFile) {
                return response()->json(['error' => 'Invalid upload'], 400);
            }

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

        return response()->json(['error' => 'No file uploaded'], 422);
    }
}
