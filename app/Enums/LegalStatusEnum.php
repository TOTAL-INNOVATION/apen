<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum LegalStatusEnum: string
{

	use EnumUtils;

	case SARL = 'SARL';

	case SA = 'SA';

	case SAS = 'SAS';

	case SCS = 'SCS';

	case SNC = 'SNC';
	
	case OTHER = 'Other';
}
