<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class ArticleService extends BaseFilterService
{
	public string $model = Article::class;

	public array $sortByAttributes = ['published_at', 'created_at', 'updated_at'];

	public function getAll(Request $request): LengthAwarePaginator
	{
		return $this->filterAllItem($request);
	}

}
