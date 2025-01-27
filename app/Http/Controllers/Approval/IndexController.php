<?php

namespace App\Http\Controllers\Approval;

use App\Enums\ApprovalStatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        /**
         * @var \App\Models\Approval|null
         */
        $approval = $request->user()->approval;
        if (!$approval) {
            return view('pages.approvals.index');
        }

        if ($approval->status === ApprovalStatusEnum::COMPLETED) {
            return to_route('payment.index');
        }

        return view($approval->view->value)
            ->with('approval', $approval);

    }
}
