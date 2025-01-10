<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\FlashInfo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class GetFlashInfos
{

	public const TARGET_VIEW = 'components.header';

    public function handle(): Collection
	{
		return Cache::remember(
			'infos',
			now()->addHours(4),
			fn() => FlashInfo::active()
			->select('title')
			->get()	
		);
	}
}
