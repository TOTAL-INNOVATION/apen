<?php

namespace App\Enums;

use App\Traits\EnumUtils;

enum TrainingLevelEnum: string
{

	use EnumUtils;

	case BAC_PLUS_ONE = 'BAC + 1';
	case BAC_PLUS_TWO = 'BAC + 2';
	case BAC_PLUS_THREE = 'BAC + 3';
	case BAC_PLUS_FOUR = 'BAC + 4';
	case BAC_PLUS_FIVE = 'BAC + 5';
	case BAC_PLUS_SIX = 'BAC + 6';
	case BAC_PLUS_SEVEN = 'BAC + 7';
	case BAC_PLUS_HEIGHT = 'BAC + 8';
	case BAC_PLUS_NINE = 'BAC + 9';
	case BAC_PLUS_TEN = 'BAC + 10';
	case BAC_PLUS_ELEVEN = 'BAC + 11';
	case BAC_PLUS_TWELVE = 'BAC + 12';
	case BAC_PLUS_THIRTHEEN = 'BAC + 13';

}
