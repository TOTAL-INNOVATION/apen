<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum ApprovalStatusEnum: string
{

	use EnumUtils;

	case IN_PROGRESS = 'En cours';

	case SUBMITTED = 'Soumise';

	case VALIDATED = 'Validée';

	case REJECTED = 'Rejétée';

}
