<?php
namespace App\Enums;

use App\Traits\EnumUtils;

enum DomainTypeEnum: string {

	use EnumUtils;

    case INFRASTRUCTURES = 'Infrastructures';

    case ENERGY = 'Energie';

    case ENGINEERING_AND_IT = 'Ingénierie et technologies';

    case RURAL_DEV_AND_FOOD_HEATH = 'Développement rural et sécurité alimentaire';

    case ENVIRONMENT = 'Environnement';

    case ECONOMIC_DEV = 'Développement économique';

    case SOCIAL_DEV = 'Développement social';

    case EDUCATION = 'Education et formation/ culture, sport et loisirs/communication';

    case HEALTH = 'Santé';

    case ADMINISTRATION = 'Administration';

    case HUMANITARIAN_OPS = 'Opérations humanitaires et l\'urgence';

    case DEMOCRARY_AND_HUMAN_RIGHT = 'Démocratie / droits de l\'homme';

    case COMMANDS_AND_SUBVENTION = 'Commande publique/Subvention/contrats';

    case FINANCE = 'Finances et micro- finances';

    case LOGISTIC = 'Transport/Logistique';

    case MINE_AND_GEOLOGY = 'Mines et géologie';

    case NUMERIC_ECONOMY = 'Economie numérique';

    case WATER = 'Eaux';

    public static function filteredValues(self $except): array
    {
        return array_filter(
            self::values(),
            fn($value) => $value !== $except->value
        );
    }

}
