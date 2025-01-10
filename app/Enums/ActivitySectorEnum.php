<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum ActivitySectorEnum: string
{

	use EnumUtils;

	case MINISTRY = 'Ministère';

	case INSTITUTION = 'Institution';

	case COLLECTIVITY = 'Collectivité térritoriale';

	case EPE = 'EPE';

	case STATE_OWNED_SOCIETY = 'Société étatique';
}
