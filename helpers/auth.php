<?php

if (!function_exists('user')) {
	function user(): \App\Models\User|null
	{
		return auth()->user();
	}
}
