<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\TransactionStatusEnum;
use App\Http\Requests\PaymentRequest;
use App\Models\Approval;
use Ligdicash\Core\Payin\Invoice;
use Ligdicash\Ligdicash;

final class PayinService
{
	private Ligdicash $client;
	private Approval $approval;
	private int $amount;

	public function __construct(Approval $approval)
	{
		$this->approval = $approval;
		$this->client = app()->make(Ligdicash::class);
		$this->amount = (int)config('ligdicash.default_amount');
	}

	public function makeInvoice(): Invoice
	{
		$invoice = $this->initInvoice();

		$invoice->addItem([
			'name' => $this->approval->type->value,
			'description' => 'Demande d\'agrément de ' . $this->approval->type->value,
			'quantity' => 1,
    		'unit_price' => $this->amount,
		]);

		return $invoice;
	}

	public function initInvoice() : Invoice
	{
		return $this->client->Invoice([
			'currency' => config('ligdicash.currency'),
			'description' => $this->getDescription(),
			'store_name' => config('ligdicash.store_name'),
			'store_website_url' => config('ligdicash.store_wesbite_url'),
		]);
	}
    
    public function getDescription(): string
    {
        return <<<EOD
            Paiement pour l\'étude du dossier de candidature
            pour l'obtention d'un agrément.
        EOD;
    }

	public function saveTransaction(PaymentRequest $request, string $token): void
	{
		$this->approval
		->transactions()
		->create([
			'token' => $token,
			'amount' => $this->amount,
			'status' => TransactionStatusEnum::PENDING,
			...$request->validated(),
		]);
	}

	/**
	 * Return array of callback, return and cancel urls
	 * required for Ligdicash API to work properly.
	 */
	public function getActionUrls() : array
	{
		return [
			'return_url' => config('ligdicash.return_url'),
            'cancel_url' => config('ligdicash.cancel_url'),
            'callback_url' => config('ligdicash.callback_url')
		];
	}
}
