<?php
namespace App\Http\Controllers\Transactions;

use App\Enums\ApprovalStatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request): RedirectResponse | View
    {
        /**
         * @var \App\Models\Approval
         */
        $approval = $request->user()->approval;

        if (! $approval || $approval->status === ApprovalStatusEnum::IN_PROGRESS) {
            return to_route('becomeExpert.form');
        }

        if ($approval->status !== ApprovalStatusEnum::COMPLETED) {
            return to_route('profile.index');
        }

        return view('pages.payment.index');
    }
}
