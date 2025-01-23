<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum ApprovalStatusEnum: string
{

	use EnumUtils;

	case IN_PROGRESS = 'En cours';

	case COMPLETED = 'En attente de paiement';

	case SUBMITTED = 'En attente de validation';

	case VALIDATED = 'Réçu et validée';

	case REJECTED = 'Rejétée';

}
