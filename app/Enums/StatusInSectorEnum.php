<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum StatusInSectorEnum: string
{
	use EnumUtils;

	case IN_ACTIVITY = 'En activité';

	case APTITUDE_SETTING = 'Mise à disposition';

	case DETACHEMENT = 'Détachement';

	case AVAILABILITY = 'Disponibilité';

	case RETIRED = 'Retraité';

}
