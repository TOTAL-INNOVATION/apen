<?php

namespace App\Http\Controllers\Transactions;

use App\Actions\MakeInvoice;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Services\PayinService;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(PaymentRequest $request): RedirectResponse
    {
        $approval = $request->getApproval();
        $service = new PayinService($approval);
        $invoice = $service->makeInvoice();

        $response = $invoice->payWithoutRedirection([
            'otp' => $request->input('otp'),
            'customer' => $request->input('phone'),
            ...$service->getActionUrls(),
        ]);

        if (!$response)
            return back()->with('error', 'messages.payment.failed');

        $service->saveTransaction($request, $response->token);

        return to_route('payment.verify');
    }
}
