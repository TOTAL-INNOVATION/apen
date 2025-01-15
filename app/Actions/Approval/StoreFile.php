<?php

declare(strict_types=1);

namespace App\Actions\Approval;

use Illuminate\Http\UploadedFile;

class StoreFile
{
    public function handle(UploadedFile $file): string|null
	{
		$path = $file->store(
			'approvals',
			['disk' => 'public']
		);
		
		if (!$path) return null;

		return "storage/$path";
	}
}
