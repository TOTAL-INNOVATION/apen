<?php if (isset($component)) { $__componentOriginal7442783a15dff2b0d32f2947a462c2e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7442783a15dff2b0d32f2947a462c2e2 = $attributes; } ?>
<?php $component = App\View\Components\BaseLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\BaseLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('metadata', null, []); ?> 
		 <?php $__env->slot('title', null, []); ?> <?php echo e(__('Mot de la secrétaire exécutive')); ?> <?php $__env->endSlot(); ?>
		<meta name="description" content="Homepage">
	 <?php $__env->endSlot(); ?>

	<main class="py-4 mb-4 sm:mb-6 lg:mb-8">
		<div class="px-4 sm:px-0 container">
			<?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
				<?php if (isset($component)) { $__componentOriginalc8d71ed199e14e5bc777e08512ec2194 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8d71ed199e14e5bc777e08512ec2194 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb.item','data' => ['href' => ''.e(route('home')).'','text' => ''.e(__('Accueil')).'','isHead' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('home')).'','text' => ''.e(__('Accueil')).'','isHead' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8d71ed199e14e5bc777e08512ec2194)): ?>
<?php $attributes = $__attributesOriginalc8d71ed199e14e5bc777e08512ec2194; ?>
<?php unset($__attributesOriginalc8d71ed199e14e5bc777e08512ec2194); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8d71ed199e14e5bc777e08512ec2194)): ?>
<?php $component = $__componentOriginalc8d71ed199e14e5bc777e08512ec2194; ?>
<?php unset($__componentOriginalc8d71ed199e14e5bc777e08512ec2194); ?>
<?php endif; ?>
				<?php if (isset($component)) { $__componentOriginalc8d71ed199e14e5bc777e08512ec2194 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8d71ed199e14e5bc777e08512ec2194 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb.item','data' => ['href' => '#','text' => ''.__('Mot de la secrétaire exécutive').'','class' => 'font-franklin-medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#','text' => ''.__('Mot de la secrétaire exécutive').'','class' => 'font-franklin-medium']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8d71ed199e14e5bc777e08512ec2194)): ?>
<?php $attributes = $__attributesOriginalc8d71ed199e14e5bc777e08512ec2194; ?>
<?php unset($__attributesOriginalc8d71ed199e14e5bc777e08512ec2194); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8d71ed199e14e5bc777e08512ec2194)): ?>
<?php $component = $__componentOriginalc8d71ed199e14e5bc777e08512ec2194; ?>
<?php unset($__componentOriginalc8d71ed199e14e5bc777e08512ec2194); ?>
<?php endif; ?>
			 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $attributes = $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $component = $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>
		</div>

		<div class="px-4 mt-4 sm:px-0 sm:mt-6 md:mt-8 lg:mt-12 container">
			<div class="article-container">
				<h2 class="heading-2 uppercase"><?php echo e(__('Mot de la secrétaire exécutive')); ?></h2>
				<div class="mt-4 md:mt-6 lg:mt-8">
					<div class="w-full aspect-[12/8] flex items-center justify-center overflow-hidden">
						<img class="w-full object-cover" src="https://placehold.co/600x400" alt="<?php echo e(__('Secrétaire exécutive')); ?>">
					</div>

					<div class="mt-4 md:mt-6 lg:mt-8 space-y-4 sm:text-lg xl:text-xl">
						<p>Le développement de notre pays implique la mise en œuvre de politiques et stratégies cohérentes avec des nombreux objectifs aussi prioritaires les uns que les autres et souvent contradictoires. Avec le contexte particulièrement difficile que traverse notre pays, des réponses efficaces et urgentes doivent être apportées à la crise sécuritaire, humanitaire, sanitaire tout en développant des mécanismes de résilience pour favoriser la croissance économique, la création d’emplois, la protection du consommateur, la préservation de l’identité culturelle nationale, l’éducation, etc.</p>

						<p>Les pouvoir publics tout comme les populations doivent alors faire preuve d’une imagination remarquable pour concevoir et mettre en œuvre les différentes politiques pour apporter les réponses appropriées à temps. C’est en cela que la mise en commun des énergies, des savoirs faire, des compétences diverses pour proposer des voies et moyens à mettre en œuvre pour sortir le pays de l’impasse dans laquelle il se trouve est indispensable. C’est là le rôle et l’importance de l’expertise nationale.</p>

						<p>En matière d’expertise ou de compétences, le Burkina Faso peut s’enorgueillir d’en disposer dans tous les domaines que ce soit au niveau national ou international. Si cette expertise est reconnue et respectée dans les différentes instances nationales ou internationales, elle n’est pas suffisamment valorisée à la hauteur du potentiel qu’elle représente.</p>

						<p>La création de l’Agence de Promotion de l’Expertise Nationale (APEN) par loi n°006-2011/AN du 11 mai 2011 est née de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil accélérateur du développement durable du Burkina Faso.</p>

						<p>L’APEN est un établissement Public de l’Etat à caractère Professionnel. Elle a pour mission de valoriser et de promouvoir l’expertise nationale qui s’entend aux termes des dispositions de l’article 2 de la loi suscitée, comme «l’ensemble des prestations intellectuelles de services qui concourent au développement socio-économique, culturel et politique».</p>

						<p>Après l’adoption de ladite loi, le Gouvernement a pris des décrets qui précisent ses modalités d’application. Il s’agit notamment du décret n°2013-208/PRES/PM/MICA/MEF du 2 avril 2013 portant attributions, organisations, et fonctionnement de l’APEN et du décret n°2013- 071/PRES/PM/MICA/MEF du 01 mars 2013 portant définition des procédures de délivrance et de retrait des agréments de l’Expertise nationale.</p>

						<p>Les experts nationaux sont des spécialistes qui mettent au service de la nation des solutions, des idées nouvelles, pour débloquer une situation dans un domaine précis. Cela implique la réflexion, la créativité, voire l’imagination pour proposer des solutions mesurables, vérifiables et qui marchent dans le temps et dans l’espace. L’expertise est au début et à la fin de tout processus de développemen</p>

						<p>C’est pourquoi, l’exercice de la profession a été encadrée par la Loi n°006-2011/AN du 17 mai 2011 qui, en son article 10, précise que l’exercice de la profession d’expert est subordonné à l’obtention d’un agrément.</p>

						<p>
							<span>L’APEN doit veiller à l’application des différents textes.</span><br>
							<span>Dans la longue marche de l’organisation de l’expertise nationale au Burkina Faso, l’opérationnalisation de l’APEN n’a pas été aussi rapide.</span>
						</p>

						<p>En effet, en dépit de ses textes d’application adoptés en 2013, l’APEN, initialement logée au sein de la Primature, n’a connu un début de fonctionnement effectif qu’en 2021 suite à son reversement à mon département. Le fonctionnement effectif de l’APEN a commencé avec la mise en place de ses organes par le Gouvernement que sont l’Assemblée Générale des experts, le Conseil d’Administration et la Commission des agréments de l’expertise nationale.</p>

						<p>Malgré les difficultés de tous ordres (financier, matériel, infrastructurel et humain) et avec un fonctionnement de près d’une année, l’APEN a déjà engrangé des résultats fort appréciables.</p>

						<p>Ainsi, à la date du 30 juin 2022, l’agence a enregistré 849 demandes d’agréments dont 420 agréments ont été accordés, 101 dossiers rejetés et 327 dossiers feront l’objet d’examen en septembre 2022.</p>

						<p>Par ailleurs, l’agence a entrepris le développement d’un site web interactif moderne pour la digitalisation de l’ensemble de ses services au profit de ses usagers. Avec ce portail web, les dépôts des dossiers d’agrément d’expertise, par exemple, devront se faire désormais en ligne.</p>
					</div>
				</div>
			</div>
		</div>
	</main>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7442783a15dff2b0d32f2947a462c2e2)): ?>
<?php $attributes = $__attributesOriginal7442783a15dff2b0d32f2947a462c2e2; ?>
<?php unset($__attributesOriginal7442783a15dff2b0d32f2947a462c2e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7442783a15dff2b0d32f2947a462c2e2)): ?>
<?php $component = $__componentOriginal7442783a15dff2b0d32f2947a462c2e2; ?>
<?php unset($__componentOriginal7442783a15dff2b0d32f2947a462c2e2); ?>
<?php endif; ?>
<?php /**PATH /home/abubakr/Bureau/apen/resources/views/pages/secretaryWords.blade.php ENDPATH**/ ?>