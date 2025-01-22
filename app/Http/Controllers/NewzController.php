<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class NewzController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()
        ->select(['slug', 'title', 'cover', 'published_at'])
        ->latest('published_at')
        ->paginate(12);

        return view(
            'pages.news.index',
            compact('articles'),
        );
    }

    public function show(string $slug): View
    {
        /**
         * @var Article
         */
        $article = Article::select(
            ['title', 'cover', 'content_path', 'published_at']
        )->where('slug', $slug)
        ->first();

        if (!$article)
            abort(404);

        $article->loadContent();

        return view('pages.news.show', compact('article'));
    }
}
