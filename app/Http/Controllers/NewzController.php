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
        ->paginate(12);

        return view(
            'pages.news.index',
            compact('articles'),
        );
    }
}
