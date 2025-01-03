<?php

namespace App\Http\Controllers;

use App\Models\Decree;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DecreeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $decrees = Decree::select(['name', 'size', 'type', 'doc_path'])->get();

        return view('pages.decrees', compact('decrees'));
    }
}
