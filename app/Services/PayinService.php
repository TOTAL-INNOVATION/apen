<?php

declare(strict_types=1);

namespace App\Services;

use Ligdicash\Core\Payin\Invoice;
use Ligdicash\Ligdicash;

final class PayinService
{
	private Ligdicash $client;

	public function __construct()
	{
		$this->client = app()->make(Ligdicash::class);
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

	/**
	 * Return array of callback, return and cancel urls
	 * required for Ligdicash API to work properly.
	 */
	public static function getActionUrls() : array
	{
		return [
			'return_url' => config('ligdicash.return_url'),
            'cancel_url' => config('ligdicash.cancel_url'),
            'callback_url' => config('ligdicash.callback_url')
		];
	}
}
