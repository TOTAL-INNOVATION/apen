<?php

declare(strict_types=1);

namespace App\Actions;

use App\Http\Requests\PaymentRequest;
use App\Services\PayinService;
use Ligdicash\Core\Payin\Invoice;

final class MakeInvoice
{
	public function handle(PaymentRequest $request): Invoice
	{
		$approval = $request->getApproval();

		$amount = 15200;
		$invoice = app(PayinService::class)->initInvoice();

		$invoice->addItem([
			'description' => 'Agrément de ' . $approval->type->value,
			'quantity' => 1,
    		'unit_price' => $amount,
		]);

		return $invoice;
	}
}
