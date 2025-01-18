<?php
namespace App\Enums;

use App\Traits\EnumUtils;

enum DegreeLevelEnum: string {

	use EnumUtils;
	
	case UPGD = 'DES';

	case PHD = 'Doctorat';

	case UPGPD = 'Master';

	case MASTER = 'Maîtrise';

	case BD = 'Licence';

	case UTD = 'DEUG, BTS, DUT, DEUST';

	case BAC = 'Baccalauréat';

	case VTC = 'CAP, BEP';
}
