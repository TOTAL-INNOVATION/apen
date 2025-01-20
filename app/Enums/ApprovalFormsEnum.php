<?php

namespace App\Enums;

enum ApprovalFormsEnum: string
{

	case INDEX = 'pages.approvals.index';

	case IDENTITY_STEP_ONE = 'pages.approvals.identity.first';

	case IDENTITY_STEP_TWO = 'pages.approvals.identity.second';

	case IDENTITY_STEP_THREE = 'pages.approvals.identity.third';

	case IDENTITY_STEP_FOUR = 'pages.approvals.identity.fourth';

	case ADDRESSES = 'pages.approvals.addresses';

	case DEGREES = 'pages.approvals.degrees';

	case TRAININGS = 'pages.approvals.trainings';

	case CERTIFICATES = 'pages.approvals.certificates';

	case SOCIETY = 'pages.approvals.society';

}
