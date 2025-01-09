<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum ExpertStatusEnum: string
{

	use EnumUtils;

	case INDEPENDANT = 'Indépendant(e)';

	case SALARIED = 'Salarié(e)';

}
