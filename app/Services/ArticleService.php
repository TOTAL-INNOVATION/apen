<?php

namespace App\Services;

use App\Actions\StoreArticleImage;
use App\Http\Requests\Article\StoreRequest;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;

class ArticleService extends BaseFilterService
{
	public string $model = Article::class;

	public array $searchAttributes = ['title'];

	public array $sortByAttributes = ['published_at', 'created_at', 'updated_at'];

	public function getAll(Request $request): LengthAwarePaginator
	{
		return $this->filterAllItem($request);
	}

	public function create(StoreRequest $request): ?Article
	{
		$title = $request->input('title');

		$article = (new Article)->fill([
			'title' => $title,
			'slug' => str($title)->slug(),
			'published_at' => $request->input('published_at') ?? now(),
		]);

		$coverPath = app(StoreArticleImage::class)->handle(
			$request->file('cover')
		);

		if (!$coverPath) return null;

		$article->cover = $coverPath;
		$article->content_path = $this->saveMarkdown(
			$request->input('content'),
		);
		$article->save();
		
		return $article;
	}
	

	protected function saveMarkdown(string $content, ?string $filename = null): string
	{
		if (!$filename)
			$filename = Random::generate(16) . '.md';
		
		Storage::disk('public')->put(
			$filename,
			$content
		);

		return "storage/articles/$filename";
	}

}
