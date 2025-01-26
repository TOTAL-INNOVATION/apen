<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Support\Facades\Storage;

class DeleteFile
{
    public function handle(string $path)
	{
		$stringable = str($path);
		if (!$stringable->startsWith('storage'))
			return;

		Storage::disk('public')->delete(
			$stringable->replace(
				'storage/',
				''
			)
		);
	}
}
