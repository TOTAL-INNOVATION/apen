<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum RoleEnum: string
{

	use EnumUtils;

	case ADMIN = 'Admin';
	case EXPERT = 'Expert';
}
