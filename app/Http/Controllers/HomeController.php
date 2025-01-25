<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Statement;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $articles = Article::latest()->take(3);
        $statements = Statement::latest()->take(7);

        return view(
            'pages.home',
            compact('articles', 'statements')
        );
    }
}
