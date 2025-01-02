<?php

namespace App\Services;

use App\Actions\StoreArticleImage;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
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

	public function update(UpdateRequest $request, Article $article): bool
	{
		$title = $request->input('title');

		$article->forceFill([
			'title' => $title,
			'slug' => str($title)->slug(),
			'published_at' => $request->input('published_at'),
		]);

		if ($file = $request->file('cover')) {
			$path = app(StoreArticleImage::class)->handle($file);
			if ($path) {
				self::deleteCover($article);
				$article->cover = $path;
			} 
		}
		$article->content_path = $this->saveMarkdown(
			$request->input('content'),
			$article->content_path,
		);

		return $article->save();

	}

	public function delete(string $id): bool
	{
		$article = $this->find($id);
		if (!$article)
			return false;
		
		return $article->delete();
	}

	protected function saveMarkdown(string $content, ?string $filename = null): string
	{
		if (!$filename)
			$filename = $this->generateMarkdownFilename();
		
		Storage::disk('public')->put(
			$filename,
			$content
		);

		return $filename;
	}

	public function find(string $id): ?Article
	{
		return Article::find($id);
	}

	/**
	 * Generate article markdown file name
	 * @return string
	 */
	public function generateMarkdownFilename(): string
	{
		$filename = $this->generateRandomFilename();
		while(Storage::disk('public')->exists($filename))
			$filename = $this->generateRandomFilename();

		return $filename;
	}

	public function generateRandomFilename(): string
	{
		$id = Random::generate(16);
		return "articles/$id.md";
	}

	public static function deleteCover(Article $article): void
	{
		Storage::disk('public')->delete(
			str($article->cover)->replace(
				'storage/', ''
			)
		);
	}

}
