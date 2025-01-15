<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum ApprovalTypeEnum: string
{

	use EnumUtils;

	case CATEGORY_A = 'Catégorie A';

	case CATEGORY_B = 'Catégorie B';

	case CATEGORY_C = 'Catégorie C';

	public static function maxDomains(self $type): int {
		return match($type) {
			self::CATEGORY_A => 3,
			self::CATEGORY_B => 2,
			default => 1
		};
	}

	public static function getTotalSteps(string $type): int {
		return match ($type) {
			self::CATEGORY_A => 14,
			self::CATEGORY_B => 10,
			default => 11
		};
	}
}
