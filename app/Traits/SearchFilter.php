<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Contracts\Database\Eloquent\Builder;

trait SearchFilter
{

	/**
	 * Do a research using a set of attributes and a needle
	 * @param \Illuminate\Contracts\Database\Eloquent\Builder $query
	 * @param string $needle
	 * @param array<string> $attributes
	 * @return void
	 */
	public function scopeSearch(Builder $query, string $needle, array $attributes = ['name']) : void
	{
		foreach($attributes as $attribute)
			$query->where($attribute, 'like', "%$needle%");
	}

}
