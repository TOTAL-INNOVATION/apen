<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum QualificationEnum: string
{
	use EnumUtils;

	case SENIOR_EXPERT = 'Expert Senior';
	
	case JUNIOR_EXPERT = 'Expert Junior';

	case CADET_EXPERT = 'Expert Cadet';

	case NONE = 'Pas Expert';

}
