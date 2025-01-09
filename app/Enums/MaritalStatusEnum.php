<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum MaritalStatusEnum: string
{

	use EnumUtils;

	case DIVORCED = 'Divorcé(e)';

	case MARRIED = 'Marié(e)';
	
	case SINGLE = 'Célibataire';
	
	case WIDOWER = 'Veuf(ve)';

}
