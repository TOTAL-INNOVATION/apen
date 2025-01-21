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

    case COMMANDS_AND_SUBVENTIONS = 'Commande publique/Subvention/contrats';

    case FINANCE = 'Finances et micro-finances';

    case LOGISTIC = 'Transport/Logistique';

    case MINE_AND_GEOLOGY = 'Mines et géologie';

    case NUMERIC_ECONOMY = 'Economie numérique';

    case WATER = 'Eaux';

    public static function filteredCases(array $excepts): array
    {
        if (!count($excepts)) {
            return self::cases();
        }

        return array_filter(
            self::cases(),
            fn($value) => !in_array(
                $value, $excepts
            )
        );
    }

    public static function subDomains(self $domainType): array
    {
        return match ($domainType) {
            self::INFRASTRUCTURES => [
                'BATIMENTS PUBLICS, INDUSTRIELS, SANTE ET FORMATION',
                'URBANISME ET AMENAGEMENT DU TERRITOIRE',
                'ROUTES, PISTES/OUVRAGES D\'ART (PONTS, TUNNELS)',
                'TRANSPORT ROUTIER ET TRAFIC',
                'AEROPORT',
                'TRANSPORT AERIEN',
                'VOIES FERREES ET TRANSPORT FERROVIAIRE',
                'EVACUATION DES EAUX USEES/ASSAINISSEMENT/HYGIENE',
                'VOIERIES',
                'GESTION MUNICIPALE (DECHETS ...)',
                'HYDRAULIQUE (BARRAGES, CANAUX D\'AMENAGEMENT)',
                'GEOLOGIE APPLIQUEE ET GEOTECHNIQUE',
                'GEODESIE ET TOPOGRAPHIE ET CADASTRE',
                'TELEDETECTION ET PHOTOGRAMMETRIE',
                'GENIE RURAL',
                'ADDUCTION D\'EAU POTABLE (AEP) ET DISTRIBUTION',
                'ETUDES HYDROLOGIQUES',
                'MAITRISE DES EAUX DE SURFACE, EAUX DE RUISSELLEMENT',
                'CONTROLE DE LA QUALITE DES EAUX',
                'GESTION INTEGREE DES RESSOURCES EN EAU (GIRE)'
            ],
            self::ENERGY => [
                'PETROLE ET GAZ NATUREL',
                'ENERGIE HYDROELECTRIQUE',
                'ENERGIE GEOTHERMIQUE',
                'ENERGIES RENOUVELABLES (SOLAIRES, EOLIENNES)',
                'ELECTROMECANIQUE',
                'ELECTRICITE ET RESEAUX ELECTRIQUES',
                'ECONOMIE D\'ENERGIE',
            ],

            self::ENGINEERING_AND_IT => [
                'GENIE CIVIL ET INDUSTRIEL (Y COMPRIS INDUSTRIE DU FROID)',
                'TELECOMMUNICATIONS',
                'INFORMATIQUE',
                'MECANIQUE',
                'CHIMIE',
                'MINES',
                'METALLURGIE ET TRAITEMENT DES METAUX',
                'ELECTRONIQUE',
                'IMPRIMERIE',
                'AUTOMATION',
                'TEXTILE, CERAMIQUE, VERRERIE, BOIS, CUIR, BRONZE',
            ],

            self::RURAL_DEV_AND_FOOD_HEATH => [
                'POLITIQUE ET STRATEGIE DE DEVELOPPEMENT RURAL',
                'SECURITE ALIMENTAIRE',
                'AGRO-ECONOMIE',
                'CREDIT RURAL',
                'REFORME AGRAIRE ET FONCIERE',
                'FILIERES AGRICOLES : DE LA PRODUCTION',
                'SERVICES D\'APPUI PRODUCTION/TRANSFORMATION ET COMMERCIALISATION',
                'FILIERES ANIMALES : DE LA PRODUCTION',
                'SERVICES D\'APPUI : SANTE ANIMALE ET VETERINAIRE',
                'GESTION DES TERROIRS ET FORESTERIE COMMUNAUTAIRE',
                'CONSERVATION DE PRODUITS',
                'BIOTECHNOLOGIES',
            ],

            self::ENVIRONMENT => [
                'POLITIQUES ET STRATEGIE DE PROTECTION ET GESTION DE L\'ENVIRONNEMENT',
                'DESERTIFICATION, CONSERVATION DES SOLS',
                'CHANGEMENTS CLIMATIQUES',
                'DIVERSITE BIOLOGIQUE / PROTECTION FAUNE ET FLORE',
                'ENVIRONNEMENT URBAIN ET NUISANCES (AIR, BRUIT, ...)',
                'TRAITEMENT DES DECHETS ET TECHNOLOGIE',
                'POLLUTION INDUSTRIELLE ET AGRICOLE',
                'PREVENTION DES CATASTROPHES NATURELLES',
                'DROIT ET LEGISLATION EN ENVIRONNEMENT, Y COMPRIS ASPECTS TRANSVERSAUX',
                'ETUDES D\'IMPACTS SUR L\'ENVIRONNEMENT (EIE)',
                'ECONOMIE DE L\'ENVIRONNEMENT',
                'PREVENTION ET GESTION DES CONFLITS RESSOURCES PARTAGEES',
                'FORETS/FORESTERIE/GESTION FORESTIERE',
                'PECHE, AQUACULTURE ET CHASSE',
                'CONTROLE DE LA QUALITE DES EAUX',
            ],

            self::ECONOMIC_DEV => [
                'ECONOMIE DU DEVELOPPEMENT',
                'MACRO-ECONOMIE ET AJUSTEMENT STRUCTUREL',
                'FINANCES PUBLIQUES / BUDGET',
                'FISCALITE',
                'STATISTIQUES',
                'PROPRIETE INTELLECTUELLE',
                'SECURITE BANCAIRE / CREDIT INVESTISSEMENT',
                'NORMES, HOMOLOGATIONS, QUALITE',
                'ASSURANCES',
                'POLITIQUE DE L\'EMPLOI',
                'DOUANES',
                'ECONOMIE DES TRANSPORTS',
                'DEVELOPPEMENT REGIONAL',
                'GESTION DES ENTREPRISES',
                'DEVELOPPEMENT DES PETITES ET MOYENNES ENTREPRISES',
                'PROMOTION COMMERCIALE ET MARKETING',
                'ONG ET SOCIETES CIVILES',
                'ARTISANAT',
                'TOURISME ET HOTELLERIE ET ECO-TOURISME',
                'POLITIQUE D\'URBANISATION ET D\'AMENAGEMENT DU TERRITOIRE',
                'POLITIQUE ET STRATEGIES DE LUTTE CONTRE LA PAUVRETE',
                'GESTION FONCIERE ET IMMOBILIERE'
            ],

            self::SOCIAL_DEV => [
                'SOCIOLOGIE DU DEVELOPPEMENT',
                'ECONOMIE DES RESSOURCES HUMAINES',
                'POLITIQUE DE L\'EMPLOI',
                'POLITIQUE DES MIGRATION ET DEMOGRAPHIE',
                'ANTHROPOLOGIE ET ETHNOLOGIE',
                'QUESTION DU GENRE',
                'LUTTE CONTRE LA DROGUE ET LE CRIME ORGANISE',
                'COOPERATION DECENTRALISEE ET SOCIETE',
                'PROTECTION DES GROUPES VULNERABLES',
                'EXCLUSION SOCIALE',
                'MICRO-PROJETS',
                'REHABILITATION (DEVELOPPEMENT ECONOMIQUE ...)',
                'STRATEGIE DE CONTINUUM / LIEN REHABILITE',
                'DEMINAGE / MINES ANTI-PERSONNELLES',
                'PREVENTION DES CONFLITS ET RESTAURATION'
            ],

            self::EDUCATION => [
                'PLANIFICATION / FINANCEMENT DE L\'EDUCATION',
                'ENSEIGNEMENT PREPARATOIRE ET PRIMAIRE',
                'ENSEIGNEMENT SECONDAIRE',
                'ENSEIGNEMENT UNIVERSITAIRE',
                'ENSEIGNEMENT NON FORMEL POUR ADULTES',
                'ENSEIGNEMENT PROFESSIONNEL ET EMPLOI',
                'RECONNAISSANCE DE TITRES ET DIPLÔMES',
                'ALPHABETISATION',
                'FORMATION ET DEVELOPPEMENT DES CAPACITES',
                'FORMATION DE FORMATEURS',
                'EDUCATION A DISTANCE ET TECHNOLOGIE DE DEVELOPPEMENT',
                'RECHERCHE EDUCATIONNELLE',
                'ADMINISTRATION ETABLISSEMENTS',
                'EQUIPEMENT ET MATERIEL SCOLAIRE',
                'STRATEGIE ET CAMPAGNE DE COMMUNICATION',
                'CUL TURE ET GESTION PATRIMOINE',
                'INFORMATION ET MEDIA AUDIO ET VIDEO / JOURNALISME / PRESSE ECRITE',
                'TECHNOLOGIE DE L\'INFORMATION',
                'TELEMATIQUE',
                'SPORT ET LOISIRS',
                'TRAVAUX ET GESTION DE LABORATOIRES',
            ],

            self::HEALTH => [
                'COORDINATION SANTE ET COORDINATION DES POLITIQUES',
                'POLITIQUE ET PLANIFICATION DE LA SANTE',
                'QUESTIONS SOCIALES ET SANTE',
                'QUESTION DU GENRE ET SANTE',
                'SOINS DE SANTE (PRIMAIRE, SECONDAIRE)',
                'SANTE PUBLIQUE (ENVIRONNEMENT, EAU ET ASSAINISSEMENT)',
                'SYSTEME MIXTE PUBLIC / PRIVE',
                'POPULATION (PLANNING FAMILIAL)',
                'SANTE MATERNELLE ET SANTE DE L\'ENFANT',
                'IST/SIDANIH',
                'EPIDEMIOLOGIE',
                'NUTRITION',
                'DROGUE/ PREVENTION /REINSERTION',
                'PROGRAMME DE TRANSFUSION SANGUINE',
                'EQUIPEMENTS DE SANTE',
                'PSYCHOSOCIALE',
                'REHABILITATION DU SYSTEME DE SANTE (PHARMACOPEE)',
            ],

            self::ADMINISTRATION => [
                'ADMINISTRATION PUBLIQUE ET REFORME',
                'ADMINISTRATION MUNICIPALE ET COLLECTIVITE',
                'DECENTRALISATION',
                'COOPERATION REGIONALE ET ASPECTS INSTITUTIONNELS',
                'ASPECTS POLITIQUES DE LA COOPERATION',
                'COOPERATION JUDICIAIRE',
                'COOPERATION POLICIERE',
                'ADMINISTRATION DU TRAVAIL',
                'COOPERATION DECENTRALISEE',
                'COOPERATION INTERNATIONALE',
            ],

            self::HUMANITARIAN_OPS => [
                'ORGANISATION ET GESTION GENERALE DES URGENCES',
                'RECENSEMENT DES POPULATIONS',
                'FOURNITURE D\'EAU ET ASSAINISSEMENT ET HYGIENE',
                'PROTECTION DES REFUGIES ET DEPLACES',
                'OPERATION DE RAPATRIEMENT ET DE REINSERTION',
                'PLAN DE SECURITE ET D\'EVACUATION DU PERSONNEL',
                'LOGISTIQUE ET TRANSPORT HUMANITAIRE',
                'AIDE/DISTRIBUTION ALIMENTAIRE',
                'AIDE MEDICALE HUMANITAIRE',
                'ABRIS PROVISOIRES (TENTES, HUTTES, CASES ...)',
            ],

            self::DEMOCRARY_AND_HUMAN_RIGHT => [
                'PAIX/RECONCILIATION NATIONALE',
                'DROITS DE L\'HOMME/DROITS DES PÉUPLES',
                'JUSTICE',
                'ELECTIONS',
                'BONNE GOUVERNANCE/LUTTE CONTRE LA PAUVRETE',
            ],

            self::COMMANDS_AND_SUBVENTIONS => [
                'MARCHES (APPEL D\'OFFRES)',
                'CONTRATS/SUBVENTIONS',
            ],

            self::FINANCE => [
                'COMPTABILITE/VERIFICATION DES COMPTES',
                'ANALYSE FINANCIERE',
                'MICRO-FINANCES',
                'MUTUELLES',
            ],

            self::LOGISTIC => [
                'AVIATION CIVILE',
                'AUTOMOBILE, INDUSTRIE, INCENDIE',
                'MÉTÉOROLOGIE ET CLIMAT',
                'MOBILITÉ URBAINE',
                'TRANSPORT ROUTIER ET TRAFIC',
                'LOGISTIQUE ET FRET',
                'TRANSPORT FLUVIAL ET MARITIME',
                'VOIES FERRÉES ET TRANSPORT FERROVIÈRE'
            ],

            self::MINE_AND_GEOLOGY => [
                'GÉOLOGIE APPLIQUÉE ET GÉOTECHNIQUE',
                'TÉLÉDÉTECTION ET PHOTOGRAMMÉTRIE',
                'HYDROGÉOLOGIE ET GÉOPHYSIQUE',
            ],

            self::NUMERIC_ECONOMY => [
                'GÉNIE LOGICIEL',
                'INFRASTRUCTURE INFORMATIQUE',
                'DESIGN GRAPHIQUE ET MULTIMÉDIA',
                'CYBERSÉCURITÉ',
                'OBJETS CONNECTÉS (IOT)',
                'INTÉLLIGENCE ARTIFICIELLE',
                'TÉLÉCOMMUNICATION',
            ],

            self::WATER => [
                'ADDUCTION D\'EAU POTABLE (AEP)/DISTRIBUTION',
                'MAÎTRISE DES EAUX DE SURFACE ET SUISSELEMENT',
                'CONTRÔLE DE LA QUALITÉ DES EAUX',
                'GESTION INTÉGRÉE DES RESSOURCES EN EAU (GIRE)',
            ]
        };
    }

}
