<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Actions\Images\StoreUploadedImageAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

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

            if (! $file instanceof UploadedFile) {
                return response()->json(['error' => 'Invalid upload'], 400);
            }

            /** @var UploadedFile $file */
            $image = (new StoreUploadedImageAction)($file, 'images', width: 400);

            return response()->json([
                'url' => storage_url($image),
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 422);
    }
}
