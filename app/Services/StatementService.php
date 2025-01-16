<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\Statement\StoreRequest;
use App\Http\Requests\Statement\UpdateRequest;
use App\Models\Statement;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class StatementService extends BaseFilterService
{
    public string $model = Statement::class;

	public array $searchAttributes = ['title'];

	public array $sortByAttributes = ['published_at', 'created_at', 'updated_at'];

	public function getAll(Request $request): LengthAwarePaginator
	{
		return $this->filterAllItem($request);
	}

	public function create(StoreRequest $request): bool
	{
		$title = $request->input('title');

		$statement = (new Statement)->fill([
			'title' => $title,
			'slug' => str($title)->slug()->limit(255),
			'published_at' => $request->input('published_at') ?? now(),
		]);

		$contentPathname = ArticleService::generateMarkdownFilename('statements');
		$statement->content_path = ArticleService::saveMarkdown(
			$request->input('content'),
			$contentPathname
		);

		return $statement->save();
	}

	public function update(UpdateRequest $request, Statement $statement): void
	{
		$title = $request->input('title');

		$statement->forceFill([
			'title' => $title,
			'slug' => str($title)->slug()->limit(255),
			'published_at' => $request->input('published_at'),
		]);

		$statement->content_path = ArticleService::saveMarkdown(
			$request->input('content'),
			$statement->content_path,
		);
		
		$statement->save();
	}

	public function find(string $id): ?Statement
	{
		return Statement::find($id);
	}
}
