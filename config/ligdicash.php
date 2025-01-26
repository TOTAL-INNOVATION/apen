<?php

return [
	'api_key' => env('LIGDICASH_API_KEY'),
	'auth_token' => env('LIGDICASH_AUTH_TOKEN'),
	'plateform' => env('LIGDICASH_PLATEFORM', 'live'),
	'currency' => env('LIGDICASH_CURRENCY', 'XOF'),
	'store_name' => env('LIGDICASH_STORE_NAME'),
	'store_wesbite_url' => env('LIGDICASH_STORE_WEBSITE'),
	'return_url' => env('LIGDICASH_RETURN_URL', 'http://localhost:8000/return'),
	'callback_url' => env('LIGDICASH_CALLBACK_URL', 'http://localhost:8000/api/callback'),
	'cancel_url' => env('LIGDICASH_CANCEL_URL', 'http://localhost:8000/cancel'),
	'default_amount' => 15000,
];
