<?php

namespace App\Http\Controllers\Panel;

use App\Enums\FlashEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\{StoreRequest, UpdateRequest};
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class ArticleController extends Controller
{

    public function __construct(
        public ArticleService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $articles = ArticleResource::collection(
            $this->service->getAll($request)
        );
        
        return inertia()->render(
            'articles/index',
            compact('articles')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return inertia()->render(
            'articles/create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $article = $this->service->create(
            $request,
        );

        if (!$article) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.article.create.failed'),
            ]);
        }

        return to_route('articles.index')->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.article.create.succeeded'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): RedirectResponse|Response
    {
        $article = $this->service->find($id);

        if (!$article) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.article.edit.notFound'),
            ]);
        }
        $article->loadContent();
        
        return inertia()->render(
            'articles/edit',
            ['article' => new ArticleResource($article)],
        );
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $article = $this->service->find($id);

        if (!$article) {
            return to_route('articles.index')
            ->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.article.edit.notFound'),
            ]);
        }

        if (!$this->service->update($request, $article)) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.article.update.failed'),
            ]);
        }

        return to_route('articles.index')
        ->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.article.update.succeeded'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->delete($id)) {
            return back()->with('flash', [
                'type' => FlashEnum::ERROR,
                'message' => __('messages.article.delete.failed'),
            ]);
        }

        return back()->with('flash', [
            'type' => FlashEnum::SUCCESS,
            'message' => __('messages.article.delete.succeeded'),
        ]);
    }
}
