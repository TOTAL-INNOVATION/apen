<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum ApprovalTypeEnum: string
{

	use EnumUtils;

	case CATEGORY_A = 'Catégorie A';

	case CATEGORY_B = 'Catégorie B';

	case CATEGORY_C = 'Catégorie C';

	public function getTotalSteps(): int {
		return match ($this) {
			self::CATEGORY_A => 14,
			self::CATEGORY_B => 10,
			default => 11
		};
	}
}
