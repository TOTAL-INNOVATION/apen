<?php

namespace App\Http\Controllers;

use App\Models\Statement;
use Illuminate\Contracts\View\View;

class ReleaseController extends Controller
{
    public function index(): View
    {
        $statements = Statement::query()
        ->select(['slug', 'title', 'published_at'])
        ->latest('published_at')
        ->paginate(12);

        return view(
            'pages.releases.index',
            compact('statements'),
        );
    }

    public function show(string $slug): View
    {
        $statement = Statement::where('slug', $slug)->first();

        if (!$statement)
            abort(404);
        $statement->loadContent();

        return view(
            'pages.releases.show',
            compact('statement')
        );
    }
}
