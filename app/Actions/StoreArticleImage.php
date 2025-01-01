<?php

declare (strict_types = 1);

namespace App\Actions;

use Illuminate\Http\UploadedFile;

class StoreArticleImage
{
    public function handle(UploadedFile $file): string | null
    {
        $path = $file->store(
            'articles/images',
            ['disk' => 'public']
        );

        return $path ? "storage/$path" : null;
    }
}
