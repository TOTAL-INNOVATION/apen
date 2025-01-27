<?php

use Illuminate\Support\Facades\Cache;

if (!function_exists('getCountries')) {
	/**
	 * Function to get all countries names with only iso codes
	 * @return array<string, string>
	 */
	function getCountries(): array
	{
		$countries = [
			'AF' => 'Afghanistan',
			'ZA' => 'Afrique du Sud',
			'AX' => 'Åland, Îles',
			'AL' => 'Albanie',
			'DZ' => 'Algérie',
			'DE' => 'Allemagne',
			'AD' => 'Andorre',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctique',
			'AG' => 'Antigua-Et-Barbuda',
			'SA' => 'Arabie Saoudite',
			'AR' => 'Argentine',
			'AM' => 'Arménie',
			'AW' => 'Aruba',
			'AU' => 'Australie',
			'AT' => 'Autriche',
			'AZ' => 'Azerbaïdjan',
			'BS' => 'Bahamas',
			'BH' => 'Bahreïn',
			'BD' => 'Bangladesh',
			'BB' => 'Barbade',
			'BY' => 'Bélarus',
			'BE' => 'Belgique',
			'BZ' => 'Belize',
			'BJ' => 'Bénin',
			'BM' => 'Bermudes',
			'BT' => 'Bhoutan',
			'BO' => 'Bolivie',
			'BQ' => 'Bonaire, Saint-Eustache et Saba',
			'BA' => 'Bosnie-Herzégovine',
			'BW' => 'Botswana',
			'BV' => 'Bouvet, Île',
			'BR' => 'Brésil',
			'BN' => 'Brunei Darussalam',
			'BG' => 'Bulgarie',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'KY' => 'Caïmans, Îles',
			'KH' => 'Cambodge',
			'CM' => 'Cameroun',
			'CA' => 'Canada',
			'CV' => 'Cap-Vert',
			'CF' => 'République centrafricaine',
			'CL' => 'Chili',
			'CN' => 'Chine',
			'CX' => 'Christmas, Île',
			'CY' => 'Chypre',
			'CC' => 'Cocos (Keeling), Îles',
			'CO' => 'Colombie',
			'KM' => 'Comores',
			'CG' => 'Congo',
			'CD' => 'Congo, République démocratique du',
			'CK' => 'Cook, Îles',
			'KR' => 'Corée du Sud',
			'KP' => 'Corée du Nord',
			'CR' => 'Costa Rica',
			'CI' => 'Côte d\'Ivoire',
			'HR' => 'Croatie',
			'CU' => 'Cuba',
			'CW' => 'Curaçao',
			'DK' => 'Danemark',
			'DJ' => 'Djibouti',
			'DO' => 'République dominicaine',
			'DM' => 'Dominique',
			'EG' => 'Égypte',
			'SV' => 'El Salvador',
			'AE' => 'Émirats Arabes Unis',
			'EC' => 'Équateur',
			'ER' => 'Érythrée',
			'ES' => 'Espagne',
			'EE' => 'Estonie',
			'US' => 'États-Unis',
			'ET' => 'Éthiopie',
			'FK' => 'Malouines, Îles',
			'FO' => 'Féroé, Îles',
			'FJ' => 'Fidji',
			'FI' => 'Finlande',
			'FR' => 'France',
			'GA' => 'Gabon',
			'GM' => 'Gambie',
			'GE' => 'Géorgie',
			'GS' => 'Géorgie du Sud-et-les Îles Sandwich du Sud',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Grèce',
			'GD' => 'Grenade',
			'GL' => 'Groenland',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernesey',
			'GN' => 'Guinée',
			'GW' => 'Guinée-Bissau',
			'GQ' => 'Guinée équatoriale',
			'GY' => 'Guyana',
			'GF' => 'Guyane française',
			'HT' => 'Haïti',
			'HM' => 'Heard-et-MacDonald, Îles',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hongrie',
			'IM' => 'Île De Man',
			'UM' => 'Îles mineures éloignées des États-Unis',
			'VG' => 'Îles Vierges britanniques',
			'VI' => 'Îles Vierges des États-Unis',
			'IN' => 'Inde',
			'ID' => 'Indonésie',
			'IR' => 'Iran',
			'IQ' => 'Iraq',
			'IE' => 'Irlande',
			'IS' => 'Islande',
			'IL' => 'Israël',
			'IT' => 'Italie',
			'JM' => 'Jamaïque',
			'JP' => 'Japon',
			'JE' => 'Jersey',
			'JO' => 'Jordanie',
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KG' => 'Kirghizistan',
			'KI' => 'Kiribati',
			'KW' => 'Koweït',
			'LA' => 'Laos',
			'LS' => 'Lesotho',
			'LV' => 'Lettonie',
			'LB' => 'Liban',
			'LR' => 'Libéria',
			'LY' => 'Libye',
			'LI' => 'Liechtenstein',
			'LT' => 'Lituanie',
			'LU' => 'Luxembourg',
			'MO' => 'Macao',
			'MK' => 'Macédoine',
			'MG' => 'Madagascar',
			'MY' => 'Malaisie',
			'MW' => 'Malawi',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malte',
			'MP' => 'Mariannes du Nord, Îles',
			'MA' => 'Maroc',
			'MH' => 'Marshall, Îles',
			'MQ' => 'Martinique',
			'MU' => 'Maurice',
			'MR' => 'Mauritanie',
			'YT' => 'Mayotte',
			'MX' => 'Mexique',
			'FM' => 'Micronésie, États fédérés de',
			'MD' => 'Moldavie',
			'MC' => 'Monaco',
			'MN' => 'Mongolie',
			'ME' => 'Monténégro',
			'MS' => 'Montserrat',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar',
			'NA' => 'Namibie',
			'NR' => 'Nauru',
			'NP' => 'Népal',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigéria',
			'NU' => 'Niué',
			'NF' => 'Norfolk, Île',
			'NO' => 'Norvège',
			'NC' => 'Nouvelle-Calédonie',
			'NZ' => 'Nouvelle-Zélande',
			'IO' => 'Territoire britannique de l\'Océan Indien',
			'OM' => 'Oman',
			'UG' => 'Ouganda',
			'UZ' => 'Ouzbékistan',
			'PK' => 'Pakistan',
			'PW' => 'Palaos',
			'PS' => 'Palestine, État de',
			'PA' => 'Panama',
			'PG' => 'Papouasie-Nouvelle-Guinée',
			'PY' => 'Paraguay',
			'NL' => 'Pays-Bas',
			'PE' => 'Pérou',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn',
			'PL' => 'Pologne',
			'PF' => 'Polynésie française',
			'PR' => 'Porto Rico',
			'PT' => 'Portugal',
			'QA' => 'Qatar',
			'RE' => 'Réunion',
			'RO' => 'Roumanie',
			'GB' => 'Royaume-Uni',
			'RU' => 'Russie',
			'RW' => 'Rwanda',
			'EH' => 'Sahara Occidental',
			'BL' => 'Saint-Barthélemy',
			'SH' => 'Sainte-Hélène',
			'LC' => 'Sainte-Lucie',
			'KN' => 'Saint-Kitts-Et-Nevis',
			'SM' => 'Saint-Marin',
			'MF' => 'Saint-Martin (partie française)',
			'SX' => 'Saint-Martin (partie néerlandaise)',
			'PM' => 'Saint-Pierre-Et-Miquelon',
			'VA' => 'Vatican',
			'VC' => 'Saint-Vincent-et-les Grenadines',
			'SB' => 'Salomon, Îles',
			'WS' => 'Samoa',
			'AS' => 'Samoa américaines',
			'ST' => 'Sao Tomé-et-Principe',
			'SN' => 'Sénégal',
			'RS' => 'Serbie',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapour',
			'SK' => 'Slovaquie',
			'SI' => 'Slovénie',
			'SO' => 'Somalie',
			'SD' => 'Soudan',
			'SS' => 'Soudan du Sud',
			'LK' => 'Sri Lanka',
			'SE' => 'Suède',
			'CH' => 'Suisse',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard et Jan Mayen',
			'SZ' => 'Swaziland',
			'SY' => 'Syrie',
			'TJ' => 'Tadjikistan',
			'TW' => 'Taïwan',
			'TZ' => 'Tanzanie',
			'TD' => 'Tchad',
			'CZ' => 'République tchèque',
			'TF' => 'Terres australes et antarctiques françaises',
			'TH' => 'Thaïlande',
			'TL' => 'Timor-Leste',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinité-et-Tobago',
			'TN' => 'Tunisie',
			'TM' => 'Turkménistan',
			'TC' => 'Turks-et-Caïcos, Îles',
			'TR' => 'Turquie',
			'TV' => 'Tuvalu',
			'UA' => 'Ukraine',
			'UY' => 'Uruguay',
			'VU' => 'Vanuatu',
			'VE' => 'Venezuela',
			'VN' => 'Viêt Nam',
			'WF' => 'Wallis et Futuna',
			'YE' => 'Yémen',
			'ZM' => 'Zambie',
			'ZW' => 'Zimbabwe',
		];

		natcasesort($countries);

		return $countries;
	}
}

if (!function_exists('countriesList')) {
	/**
	 * Function that return countries informations
	 * including name, iso code, calling code, emoji
	 * @return array<string, array<string, null|string>>
	 */
	function countriesList(): array
	{
		$allCountries = getCountries();
		return Cache::rememberForever('countries', function() use ($allCountries): array {
			$countries = [];
			foreach ($allCountries as $isoCode => $name) {
				/**
				 * @var \Rinvex\Country\Country
				 */
				$rinvexCountry = country($isoCode);

				$countries[$isoCode] = [
					'name' => $name,
					'callingCode' => $rinvexCountry->getCallingCode(),
					'emoji' => $rinvexCountry->getEmoji(),
				];
			}

			return $countries;
		});
	}
}

if (!function_exists('regionsOfBurkinaFaso')) {
	function regionsOfBurkinaFaso() {
		return [
			'Boucle du Mouhoun' => [
				'Balé',
				'Banwa',
				'Kossi',
				'Mouhoun',
				'Nayala',
				'Sourou',
			],
			'Cascades' => [
				'Comoé',
				'Léraba',
			],
			'Centre' => [
				'Kadiogo',
			],
			'Centre-Est' => [
				'Boulgou',
				'Koulpéogo',
				'Kouritenga',
			],
			'Centre-Nord' => [
				'Bam',
				'Namentenga',
				'Sanmatenga',
			],
			'Centre-Ouest' => [
				'Boulkiemdé',
				'Sanguié',
				'Sissili',
				'Ziro',
			],
			'Centre-Sud' => [
				'Bazèga',
				'Nahouri',
				'Zoundwéogo',
			],
			'Est' => [
				'Gnagna',
				'Gourma',
				'Komandjoari',
				'Kompienga',
				'Tapoa',
			],
			'Hauts-Bassins' => [
				'Houet',
				'Kénédougou',
				'Tuy',
			],
			'Nord' => [
				'Loroum',
				'Passoré',
				'Yatenga',
				'Zondoma',
			],
			'Plateau Central' => [
				'Ganzourgou',
				'Kourwéogo',
				'Oubritenga',
			],
			'Sahel' => [
				'Oudalan',
				'Séno',
				'Soum',
				'Yagha',
			],
			'Sud-Ouest' => [
				'Bougouriba',
				'Ioba',
				'Noumbiel',
				'Poni',
			]
		];
	}
}
