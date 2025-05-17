<?php

declare(strict_types=1);

use App\Actions\Images\DeleteImageAction;
use Illuminate\Support\Facades\Storage;

test('can delete image', function () {

    Storage::fake();

    $path = '2022-07-13.jpg';

    Storage::disk('public')->put($path, 'content');

    app(DeleteImageAction::class)($path);

    Storage::disk('public')->assertMissing($path);
});
