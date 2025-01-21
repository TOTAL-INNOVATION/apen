<?php

namespace App\Enums;

use App\Models\Approval;

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

	case DOMAINS_INDEX = 'pages.approvals.domains.index';

	public static function goToNext(Approval $approval): void
	{

		switch ($approval->view) {
			case self::IDENTITY_STEP_ONE:
				$approval->update(['view' => self::IDENTITY_STEP_TWO]);
				break;

			case self::IDENTITY_STEP_TWO:
				$approval->update([
					'view' => $approval->type === ApprovalTypeEnum::CATEGORY_A ?
					self::ADDRESSES : self::IDENTITY_STEP_THREE,
				]);
				break;

			case self::IDENTITY_STEP_THREE:
				$approval->update([
					'view' => $approval->type === ApprovalTypeEnum::CATEGORY_B ?
					self::ADDRESSES : self::IDENTITY_STEP_FOUR,
				]);
				break;

			case self::IDENTITY_STEP_FOUR:
				$approval->update(['view' => self::ADDRESSES]);
				break;

			case self::ADDRESSES:
				$approval->update(['view' => self::DEGREES]);
				break;
				
			case self::DEGREES:
				$approval->update(['view' => self::TRAININGS]);
				break;
			
			case self::TRAININGS:
				$approval->update(['view' => self::CERTIFICATES]);
				break;
			
			case self::CERTIFICATES:
				$approval->update([
					'view' => $approval->type === ApprovalTypeEnum::CATEGORY_A ?
					self::SOCIETY : self::DOMAINS_INDEX
				]);
				break;
		}
	}

}
