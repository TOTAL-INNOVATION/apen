<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum TransactionStatusEnum: string
{

	use EnumUtils;

	case PENDING = 'En cours';

	case FAILED = 'Echoué';

	case SUCCEEDED = 'Réussi';
}
