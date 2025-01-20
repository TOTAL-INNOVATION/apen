<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        /**
         * @var \App\Models\Approval|null
         */
        $approval = $request->user()->approval;

        if ($approval) {
            return view($approval->view->value)
            ->with('approval', $approval);
        }

        return view('pages.approvals.index');
    }
}
