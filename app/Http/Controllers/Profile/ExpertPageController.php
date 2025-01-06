<?php

namespace App\Http\Controllers\Profile;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ExpertPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        if ($request->user()->role !== RoleEnum::EXPERT) {
            abort(403);
        }
        return view('pages.profile.index');
    }
}
