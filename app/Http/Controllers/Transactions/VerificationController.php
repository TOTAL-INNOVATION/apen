<?php

namespace App\Http\Controllers\Transactions;

use App\Enums\ApprovalStatusEnum;
use App\Enums\TransactionStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Approval;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class VerificationController extends Controller
{
    public function index(): RedirectResponse|View
    {
        $approval = $this->getApproval();
        
        if (!$approval)
            return to_route('profile.index');
        
        $transaction = $approval
        ->transactions()
        ->latest()
        ->first();

        if ($transaction->status === TransactionStatusEnum::FAILED) {
            return to_route('payment.index')
            ->with(
                'error',
                'messages.payment.failed',
            );
        }

        return view(
            'pages.payment.verification',
            compact('transaction')
        );
    }

    public function ping(): JsonResponse
    {
        $approval = $this->getApproval();

        if (!$approval) {
            return response()->json([], 403);
        };

        $transaction = $approval
        ->transactions()
        ->latest()
        ->first();

        switch ($transaction->status) {
            case TransactionStatusEnum::FAILED:
                return response()->json([
                    'transaction_status' => 0,
                ]);
            
            case TransactionStatusEnum::SUCCEEDED:
                return response()->json([
                    'transaction_status' => 1,
                ]);
            
            default:
            return response()->json([
                'transaction_status' => -1,
            ]);
        }
    }

    protected function getApproval(): ?Approval
    {
        return user()
        ->approvals()
        ->where('status', ApprovalStatusEnum::COMPLETED)
        ->orWhere('status', ApprovalStatusEnum::SUBMITTED)
        ->first();
    }
}
