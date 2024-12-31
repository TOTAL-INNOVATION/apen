<?php

declare (strict_types = 1);

namespace App\Actions;

use App\Http\Requests\Article\Image\StoreRequest;

class StoreArticleImage
{
    public function handle(StoreRequest $request): string | null
    {
        $path = $request->file('image')
            ->store(
                'articles',
                ['disk' => 'public']
            );

        return $path ? "storage/$path" : null;
    }
}
