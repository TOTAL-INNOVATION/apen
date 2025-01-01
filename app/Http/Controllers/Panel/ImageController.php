<?php

namespace App\Http\Controllers\Panel;

use App\Actions\StoreArticleImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\Image\DeleteRequest;
use App\Http\Requests\Article\Image\StoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $path = app(StoreArticleImage::class)->handle(
            $request->file('image')
        );

        if (!$path) {
            return response()->json(
                ['message' => __('messages.article.image.storingFailed')],
                422
            );
        }

        return response()->json([
            'path' => $path,
            'message' => __('messages.article.image.stored'),
        ]);
    }

    public function delete(DeleteRequest $request)
    {
        $path = str($request->input('path'))
            ->replace('storage/', '');

        if (!Storage::disk('public')->delete($path)) {
            return response()->json([
                'message' => __('messages.article.image.deleteFailed'),
            ], 422);
        }

        return response()->json([
            'message' => __('messages.article.image.deleted'),
        ]);
    }
}
