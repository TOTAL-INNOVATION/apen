<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum GenderEnum: string
{

	use EnumUtils;

	case MALE = 'Masculin';

	case FEMALE = 'Féminin';

}
