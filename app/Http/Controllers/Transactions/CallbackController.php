<?php

namespace App\Http\Controllers\Transactions;

use App\Enums\ApprovalStatusEnum;
use App\Enums\TransactionStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): void
    {
        if (!$request->isJson()) {
            return;
        }

        $transaction = Transaction::where(
            'token',
            $request->input('token')
        )->first();

        if (!$transaction || $request->input('status') !== 'completed') {
            return;
        }

        $transaction->update(['status' => TransactionStatusEnum::SUCCEEDED]);
        $transaction->approval->update([
            'status' => ApprovalStatusEnum::SUBMITTED,
        ]);
    }
}
