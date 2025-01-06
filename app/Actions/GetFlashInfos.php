<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\FlashInfo;
use Illuminate\Database\Eloquent\Collection;

class GetFlashInfos
{

	public const TARGET_VIEW = 'components.header';

    public function handle(): Collection
	{
		return FlashInfo::active()
		->select('title')
		->get();
	}
}
