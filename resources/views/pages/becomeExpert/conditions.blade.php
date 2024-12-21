<x-base-layout>
	<x-slot:metadata>
		<x-slot:title>Conditions d’obtention de l’agrément d’expert</x-slot:title>
		<meta name="description" content="Homepage">
	</x-slot:metadata>

	<main class="py-4 mb-4 sm:mb-6 lg:mb-8">
		<div class="px-4 sm:px-0 container">
			<x-breadcrumb>
				<x-breadcrumb.item
					href="{{ route('home') }}"
					text="Accueil"
					isHead
				/>
				<x-breadcrumb.item
					href="{{ route('becomeExpert.index') }}"
					text="Devenir expert"
				/>
				<x-breadcrumb.item
					href="#"
					text="{!! __('Conditions') !!}"
					class="font-franklin-medium"
				/>
			</x-breadcrumb>
		</div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
			<div class="article-container">
				<h2 class="heading-2 uppercase">Conditions d’obtention de l’agrément d’expert</h2>

				<div class="mt-4 md:mt-6 lg:mt-8 space-y-4 sm:text-lg xl:text-xl">
					<p class="font-franklin-medium">Pour prétende à un agrément de catégorie B ou C, les candidats doivent remplir les conditions de diplôme et d’expérience ci-dessous:</p>

					<div class="overflow-x-scroll">
						<x-table class="contiditons-table text-base">
							<x-table.header>
								<x-table.row>
									<x-table.head class="border-b border-whisper">Classe</x-table.head>
									<x-table.head class="w-[250px]">Nombre d’année d’experience</x-table.head>
									<x-table.head>Diplôme réquis</x-table.head>
								</x-table.row>
							</x-table.header>
	
							<x-table.body>
								<x-table.row class="condition-row">
									<x-table.cell rowspan="3" aria-rowcount="3">Expert Senior</x-table.cell>
									<x-table.cell>Cinq(05) ans</x-table.cell>
									<x-table.cell>Doctorat, DEA, DESS ou diplômes reconnus équivalents.</x-table.cell>
								</x-table.row>
								
								<x-table.row class="condition-row">
									<x-table.cell>Sept(07) ans</x-table.cell>
									<x-table.cell>Maîtrise ou diplôme reconnu équivalent.</x-table.cell>
								</x-table.row>

								<x-table.row class="condition-row">
									<x-table.cell>Neuf(09) ans</x-table.cell>
									<x-table.cell>Licence ou diplôme reconnu équivalent.</x-table.cell>
								</x-table.row>

								<x-table.row class="condition-row">
									<x-table.cell rowspan="3" aria-rowcount="3">Expert Junior</x-table.cell>
									<x-table.cell>Deux(02) ans</x-table.cell>
									<x-table.cell>Doctorat, DEA, DESS, ou diplômes reconnus équivalents.</x-table.cell>
								</x-table.row>

								<x-table.row class="condition-row">
									<x-table.cell>Quatre(04) ans</x-table.cell>
									<x-table.cell>Maîtrise ou diplôme reconnu équivalent.</x-table.cell>
								</x-table.row>

								<x-table.row class="condition-row">
									<x-table.cell>Six(06) ans</x-table.cell>
									<x-table.cell>Licence ou diplôme reconnu équivalent.</x-table.cell>
								</x-table.row>

								<x-table.row class="condition-row">
									<x-table.cell rowspan="2" aria-rowcount="2">Expert Cadet</x-table.cell>
									<x-table.cell>Deux(02) ans</x-table.cell>
									<x-table.cell>Maîtrise ou diplôme reconnu équivalent.</x-table.cell>
								</x-table.row>

								<x-table.row class="condition-row">
									<x-table.cell>Trois(03) ans</x-table.cell>
									<x-table.cell>Licence ou diplôme reconnu équivalent.</x-table.cell>
								</x-table.row>

							</x-table.body>
						</x-table>
					</div>

					<p class="font-franklin-medium">Pour prétendre à un agrément de la catégorie A, les candidats exerçant sous la forme de société d’expertise ou assimilés doivent:</p>

					<ul class="space-y-2">
						<x-custom-list-item class="font-franklin-regular">
							avoir parmi ses créateurs ou actionnaires une personne ayant la qualité d’Expert senior défini ci-dessus;
						</x-custom-list-item>
						<x-custom-list-item class="font-franklin-regular">
							doit être une personne morale régulièrement constituée et dont l’objet social se rapporte à l’expertise.
						</x-custom-list-item>
					</ul>

					<p>La société peut être unipersonnelle ou pluripersonnelle. La société est unipersonnelle quand elle est créée par une personne ayant la qualité d’expert senior. Elle est pluripersonnelle lorsqu’elle est créée par plusieurs personnes dont au moins une a la qualité d’expert senior.</p>

					<p class="font-franklin-medium">Composition du dossier de demande d’agrément.</p>
					<div class="ml-1 sm:ml-2 md:ml-3 lg:ml-4 xl:ml-5">
						<p class="my-2">Pour la demande de l’agrément de la catégorie A (personne morale/Société ou assimilée)</p>

						<ul class="space-y-2">
							<x-custom-list-item class="font-franklin-regular">
								une demande timbrée à 200 FCFA adressée à la Commission des agréments précisant les noms et prénoms de la personnalité habilitée à diriger la société d’expertise;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								un curriculum vitae et une copie certifiée conforme des titres ou diplômes dont le dirigeant entend se prévaloir; dans le curriculum vitae les activités professionnelles que l’expert a exercées avec l’indication des dates et lieux d’exercice, le nombre d’années d’expérience d’expertise doivent être consignées ;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								un état détaillé du personnel de la société d’expertise, le curriculum vitae et les copies légalisées des diplômes du personnel d’encadrement ; dans le curriculum vitae les activités professionnelles que l’expert a exercées avec l’indication des dates et lieux d’exercice, le nombre d’années d’expérience d’expertise doivent être mentionnées;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								les pièces justificatives de la pratique professionnelle de la société d’expertise;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								un formulaire d’identification des professionnels de la société d’expertise destiné au fichier central des experts agréés, dûment rempli;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								un inventaire du matériel et de l’outillage appartenant à la société d’ expertise;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								une copie du Registre du commerce et du crédit immobilier de la société (RCCM);
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								une copie du Statut de la société;
							</x-custom-list-item>
							
							<x-custom-list-item class="font-franklin-regular">
								Une copie du Certificat d’agrément B Sénior ou C sénior d’au moins un des associés- actionnaires de la société (il est possible de faire la demande de l’agrément d’un associé- actionnaire de la société remplissant les conditions d’un Expert sénior lors de votre demande pour la société. Il faut alors le mentionner dans votre demande pour la société. Le traitement de la demande d’agrément de la société est alors assujetti à l’accord de cette demande d’associé en classe sénior);
							</x-custom-list-item>
							
							<x-custom-list-item class="font-franklin-regular">
								une déclaration sur l’honneur certifiant que les informations mentionnées dans le dossier sont justes;
							</x-custom-list-item>
							
							<x-custom-list-item class="font-franklin-regular">
								un reçu de paiement des frais de dossier (non remboursable) d’un montant de <strong>15 200 FCFA</strong> délivré par le service comptable de l’APEN. Frais payable à la <strong>Direction des Guichets Uniques du Commerce et de l’Investissement Sise à la Maison de l’Entreprise</strong>.
							</x-custom-list-item>
						</ul>
					</div>

					<p><span class="font-franklin-medium">NB 1:</span> Comme pièces de la pratique professionnelle, veuillez joindre par exemple : les copies des contrats, des attestations de bonne fin d’exécution, les attestations de travail, les documents élaborés reconnus marquant que vous en êtes l’auteur ou un des auteurs, les décisions de nomination, les contrats d’objectifs, les lettres de missions, les documents officiels, les décisions ou arrêtés ou décrets portant les attributions à vous confier, etc.</p>

					<p><span class="font-franklin-medium">NB 2:</span> Au regard de la prise en compte du nombre d’années d’exercice effectivement prouvé, veuillez en tenir compte dans la fourniture des pièces justificatives.</p>

					<p class="font-franklin-medium">Pour la demande de l’agrément de la catégorie B (personne physique du secteur privé)</p>

					<div class="ml-1 sm:ml-2 md:ml-3 lg:ml-4 xl:ml-5">
						<ul class="space-y-2">
							<x-custom-list-item class="font-franklin-regular">
								une demande timbrée à 200 FCFA adressée à la Commission des agréments précisant le nom et le(s) prénom(s) de la personnalité habilitée à diriger l’entreprise d’expertise individuelle <strong>(personne physique)</strong>;
							</x-custom-list-item>
							
							<x-custom-list-item class="font-franklin-regular">
								un curriculum vitae et une copie certifiée conforme des titres ou diplômes dont l’expert entend se prévaloir ; dans le Curriculum Vitae les activités professionnelles que l’expert a exercées avec l’indication des dates et lieux d’exercice, le nombre d’années d’expérience d’expertise doivent être mentionnées;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								les pièces justificatives de la pratique professionnelle de l’entreprise d’expertise individuelle ;
un formulaire d’identification de l’entreprise d’expertise individuelle destiné au fichier central des experts agréés, dûment rempli;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								une déclaration sur l’honneur certifiant que les informations consignées dans le dossier sont justes;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								un reçu de paiement des frais de dossier (non remboursable) d’un montant de <strong>15 000 FCFA</strong> délivré par le service comptable de l’APEN. Frais payable à la <strong>Direction des Guichets Uniques du Commerce et de l’Investissement Sise à la Maison de l’Entreprise</strong>.
							</x-custom-list-item>
						</ul>
					</div>

					<p><span class="font-franklin-medium">NB 1:</span> Comme pièces de la pratique professionnelle, veuillez joindre par exemple : les copies des contrats, des attestations de bonne fin d’exécution, les attestations de travail, les documents élaborés reconnus marquant que vous en êtes l’auteur ou un des auteurs, les décisions de nomination, les contrats d’objectifs, les lettres de missions, les documents officiels, les décisions ou arrêtés ou décrets portant les attributions à vous confier, etc.</p>

					<p><span class="font-franklin-medium">NB 2:</span> Au regard de la prise en compte du nombre d’années d’exercice effectivement prouvé, veuillez en tenir compte dans la fourniture des pièces justificatives.</p>

					<p class="font-franklin-medium">Pour la demande de l’agrément de la catégorie C (expertise assurée par les agents publics)</p>

					<div class="ml-1 sm:ml-2 md:ml-3 lg:ml-4 xl:ml-5">
						<ul class="space-y-2">
							<x-custom-list-item class="font-franklin-regular">
								une demande timbrée à 200 FCFA adressée à la Commission des agréments;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								une copie certifiée conforme des titres ou diplômes dont l’expert entend se prévaloir;
							</x-custom-list-item>
							
							<x-custom-list-item class="font-franklin-regular">
								un curriculum vitae dans lequel sont mentionnées les activités professionnelles que l’expert a exercées avec l’indication des dates et lieux d’exercice, le nombre d’années d’expérience d’expertise;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								les pièces justificatives de la pratique professionnelle;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								un formulaire d’identification des professionnels de l’entreprise d’expertise individuelle, destiné au fichier central des experts agréés, dûment rempli;
							</x-custom-list-item>
							
							<x-custom-list-item class="font-franklin-regular">
								une déclaration sur l'honneur certifiant que les informations contenues dans le dossier sont justes;
							</x-custom-list-item>

							<x-custom-list-item class="font-franklin-regular">
								un reçu de paiement des frais de dossier (non remboursable) d’un montant de <strong>15 200 FCFA</strong> délivré par le service comptable de l’APEN. Frais payable à la <strong>Direction des Guichets Uniques du Commerce et de l’Investissement Sise à la Maison de l’Entreprise</strong>.
							</x-custom-list-item>

						</ul>
					</div>

					<p><span class="font-franklin-medium">NB 1:</span> Comme pièces de la pratique professionnelle, veuillez joindre par exemple : les copies des contrats, des attestations de bonne fin d’exécution, les attestations de travail, les documents élaborés reconnus marquant que vous en êtes l’auteur ou un des auteurs, les décisions de nomination, les contrats d’objectifs, les lettres de missions, les documents officiels, les décisions ou arrêtés ou décrets portant les attributions à vous confier, etc.</p>
					
					<p><span class="font-franklin-medium">NB 2:</span> Au regard de la prise en compte du nombre d’années d’exercice effectivement prouvé, veuillez en tenir compte dans la fourniture des pièces justificatives.</p>


					<p class="font-franklin-medium">Les frais de délivrance de l’agrément d’expertise</p>

					<p>Les frais de délivrance sont payables au retrait de l’agrément et sont fixés comme suit :</p>

					<div class="overflow-x-scroll">
						<x-table class="contiditons-table text-base">
							<x-table.header>
								<x-table.row class="border-b border-whisper">
									<x-table.head colspan="2" aria-colspan="2">{{ __('Catégories d’agréments') }}</x-table.head>
									<x-table.head class="whitespace-nowrap">{{ __('Montant en FCFA') }}</x-table.head>
								</x-table.row>
							</x-table.header>
							<x-table.body>
								<x-table.row class="condition-row">
									<x-table.cell class="text-start" colspan="2" aria-colspan="2">Agréments de catégorie A (Sociétés et assimilés)</x-table.cell>
									<x-table.cell>200.000</x-table.cell>
								</x-table.row>

								<x-table.row class="condition-row">
									<x-table.cell class="text-start" rowspan="3" aria-rowspan="3">
										Agréments de catégorie B (entreprise individuelle) et catégorie C (agents publics)
									</x-table.cell>
									<x-table.cell>Sénior</x-table.cell>
									<x-table.cell>100.000</x-table.cell>
								</x-table.row>
								<x-table.row class="condition-row">
									<x-table.cell>Junior</x-table.cell>
									<x-table.cell>85.000</x-table.cell>
								</x-table.row>
								<x-table.row class="condition-row">
									<x-table.cell>Cadet</x-table.cell>
									<x-table.cell>60.000</x-table.cell>
								</x-table.row>
							</x-table.body>
						</x-table>
					</div>

					<p>Aucun frais est exigible en dehors du paiement de ces montants.</p>
				</div>
			</div>
		</div>
	</main>
</x-base-layout>