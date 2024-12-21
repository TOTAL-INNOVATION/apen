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
		 <?php $__env->slot('title', null, []); ?> <?php echo e(__('Page d\'accueil')); ?> <?php $__env->endSlot(); ?>
		<meta name="description" content="L'APEN est un Etablissement Public de l'Etat à caractère Professionnel.">
	 <?php $__env->endSlot(); ?>
	<main>
		<div class="sm:aspect-video md:aspect-auto md:min-h-[400px] md:h-[calc(100svh-179.617px)] max-w-screen-2xl">
			<div class="h-full overflow-x-hidden news_slides">
				<div class="h-full flex slides_container">

					<?php if (isset($component)) { $__componentOriginal3426a7dc89b64781db0282e2bb1ccf7a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3426a7dc89b64781db0282e2bb1ccf7a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news-slide','data' => ['title' => ''.e(__('Visite au SIAO 2023')).'','description' => ''.e(__('L’APEN est un établissement Public de l’Etat à caractère professionnel, né de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil propulseur du développement durable du Burkina Faso.')).'','coverSrc' => ''.e(asset('assets/apen_au_siao.jpeg')).'','url' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('news-slide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Visite au SIAO 2023')).'','description' => ''.e(__('L’APEN est un établissement Public de l’Etat à caractère professionnel, né de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil propulseur du développement durable du Burkina Faso.')).'','coverSrc' => ''.e(asset('assets/apen_au_siao.jpeg')).'','url' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3426a7dc89b64781db0282e2bb1ccf7a)): ?>
<?php $attributes = $__attributesOriginal3426a7dc89b64781db0282e2bb1ccf7a; ?>
<?php unset($__attributesOriginal3426a7dc89b64781db0282e2bb1ccf7a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3426a7dc89b64781db0282e2bb1ccf7a)): ?>
<?php $component = $__componentOriginal3426a7dc89b64781db0282e2bb1ccf7a; ?>
<?php unset($__componentOriginal3426a7dc89b64781db0282e2bb1ccf7a); ?>
<?php endif; ?>

					<?php if (isset($component)) { $__componentOriginal3426a7dc89b64781db0282e2bb1ccf7a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3426a7dc89b64781db0282e2bb1ccf7a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news-slide','data' => ['title' => ''.e(__('2è session ordinaire de l’Assemblée Générale des Experts agréés')).'','description' => ''.e(__('La deuxième Assemblée Générale des Experts s’est tenue le jeudi 23 novembre 2023 dans la salle de conférence du bâtiment R+1 du Salon International de l’Artisanat de Ouagadougou (SIAO).')).'','coverSrc' => ''.e(asset('assets/grand_assemblée.jpg')).'','url' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('news-slide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('2è session ordinaire de l’Assemblée Générale des Experts agréés')).'','description' => ''.e(__('La deuxième Assemblée Générale des Experts s’est tenue le jeudi 23 novembre 2023 dans la salle de conférence du bâtiment R+1 du Salon International de l’Artisanat de Ouagadougou (SIAO).')).'','coverSrc' => ''.e(asset('assets/grand_assemblée.jpg')).'','url' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3426a7dc89b64781db0282e2bb1ccf7a)): ?>
<?php $attributes = $__attributesOriginal3426a7dc89b64781db0282e2bb1ccf7a; ?>
<?php unset($__attributesOriginal3426a7dc89b64781db0282e2bb1ccf7a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3426a7dc89b64781db0282e2bb1ccf7a)): ?>
<?php $component = $__componentOriginal3426a7dc89b64781db0282e2bb1ccf7a; ?>
<?php unset($__componentOriginal3426a7dc89b64781db0282e2bb1ccf7a); ?>
<?php endif; ?>
					
				</div>
			</div>
		</div>

		<section class="pt-4 sm:pt-6 md:pt-8 lg:pt-12">
			<div class="px-4 sm:px-auto container">
				<div class="grid grid-cols-1 xl:grid-cols-7 gap-4 sm:gap-6">
					<div class="xl:col-span-4 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
						
						<?php if (isset($component)) { $__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.priority-card','data' => ['title' => ''.e(__('Devenir expert')).'','description' => ''.__('Conditions, procédure d\'inscription, formulaire de candidature').'','imageSrc' => '#','href' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('priority-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Devenir expert')).'','description' => ''.__('Conditions, procédure d\'inscription, formulaire de candidature').'','imageSrc' => '#','href' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4)): ?>
<?php $attributes = $__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4; ?>
<?php unset($__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4)): ?>
<?php $component = $__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4; ?>
<?php unset($__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4); ?>
<?php endif; ?>

						<?php if (isset($component)) { $__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.priority-card','data' => ['title' => ''.e(__('Placement')).'','description' => ''.__('Offres d\'emploi, annonces de recrutement').'','imageSrc' => '#','href' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('priority-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Placement')).'','description' => ''.__('Offres d\'emploi, annonces de recrutement').'','imageSrc' => '#','href' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4)): ?>
<?php $attributes = $__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4; ?>
<?php unset($__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4)): ?>
<?php $component = $__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4; ?>
<?php unset($__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4); ?>
<?php endif; ?>

					</div>

					<div class="xl:col-span-3 flex flex-col gap-y-4 sm:gap-y-6">
						<?php if (isset($component)) { $__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.priority-card','data' => ['variant' => 'horizontal','title' => ''.e(__('Communiqués')).'','description' => ''.e(__('Rubriques communiqués')).'','imageSrc' => '#','href' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('priority-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'horizontal','title' => ''.e(__('Communiqués')).'','description' => ''.e(__('Rubriques communiqués')).'','imageSrc' => '#','href' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4)): ?>
<?php $attributes = $__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4; ?>
<?php unset($__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4)): ?>
<?php $component = $__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4; ?>
<?php unset($__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4); ?>
<?php endif; ?>

						<?php if (isset($component)) { $__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.priority-card','data' => ['variant' => 'horizontal','title' => ''.e(__('Newsletter')).'','description' => ''.__('Bulletin d\'informations').'','imageSrc' => '#','href' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('priority-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'horizontal','title' => ''.e(__('Newsletter')).'','description' => ''.__('Bulletin d\'informations').'','imageSrc' => '#','href' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4)): ?>
<?php $attributes = $__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4; ?>
<?php unset($__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4)): ?>
<?php $component = $__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4; ?>
<?php unset($__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4); ?>
<?php endif; ?>

					</div>
				</div>
				
				
			</div>
		</section>

		<div>
			<div class="py-4 sm:py-6 md:py-8 lg:py-12 px-4 container">
				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
					<section class="sm:col-span-2">
						<h2 class="heading-2 uppercase"><?php echo e(__('Actualités')); ?></h2>
						<div class="mt-2 sm:mt-4 md:mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
							<?php if (isset($component)) { $__componentOriginal1a2825a6708c27e00d3538c2a0d29d90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1a2825a6708c27e00d3538c2a0d29d90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news-card','data' => ['title' => ''.e(__('Visite au SIAO 2023')).'','description' => ''.e(__('L’APEN est un établissement Public de l’Etat à caractère professionnel, né de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil propulseur du développement durable du Burkina Faso.')).'','coverSrc' => ''.e(asset('assets/apen_au_siao.jpeg')).'','url' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('news-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Visite au SIAO 2023')).'','description' => ''.e(__('L’APEN est un établissement Public de l’Etat à caractère professionnel, né de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil propulseur du développement durable du Burkina Faso.')).'','coverSrc' => ''.e(asset('assets/apen_au_siao.jpeg')).'','url' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1a2825a6708c27e00d3538c2a0d29d90)): ?>
<?php $attributes = $__attributesOriginal1a2825a6708c27e00d3538c2a0d29d90; ?>
<?php unset($__attributesOriginal1a2825a6708c27e00d3538c2a0d29d90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1a2825a6708c27e00d3538c2a0d29d90)): ?>
<?php $component = $__componentOriginal1a2825a6708c27e00d3538c2a0d29d90; ?>
<?php unset($__componentOriginal1a2825a6708c27e00d3538c2a0d29d90); ?>
<?php endif; ?>
	
							<?php if (isset($component)) { $__componentOriginal1a2825a6708c27e00d3538c2a0d29d90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1a2825a6708c27e00d3538c2a0d29d90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news-card','data' => ['title' => ''.e(__('Visite au SIAO 2023')).'','description' => ''.e(__('L’APEN est un établissement Public de l’Etat à caractère professionnel, né de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil propulseur du développement durable du Burkina Faso.')).'','coverSrc' => ''.e(asset('assets/apen_au_siao.jpeg')).'','url' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('news-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Visite au SIAO 2023')).'','description' => ''.e(__('L’APEN est un établissement Public de l’Etat à caractère professionnel, né de la volonté du Gouvernement et des acteurs du domaine de l’expertise à faire de l’expertise nationale un outil propulseur du développement durable du Burkina Faso.')).'','coverSrc' => ''.e(asset('assets/apen_au_siao.jpeg')).'','url' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1a2825a6708c27e00d3538c2a0d29d90)): ?>
<?php $attributes = $__attributesOriginal1a2825a6708c27e00d3538c2a0d29d90; ?>
<?php unset($__attributesOriginal1a2825a6708c27e00d3538c2a0d29d90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1a2825a6708c27e00d3538c2a0d29d90)): ?>
<?php $component = $__componentOriginal1a2825a6708c27e00d3538c2a0d29d90; ?>
<?php unset($__componentOriginal1a2825a6708c27e00d3538c2a0d29d90); ?>
<?php endif; ?>
						</div>
						
						<div class="mt-4 md:mt-6">
							<?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['variant' => 'outline','size' => 'lg','component' => 'a','href' => '#','class' => 'w-full sm:w-auto arrow-move-trigger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline','size' => 'lg','component' => 'a','href' => '#','class' => 'w-full sm:w-auto arrow-move-trigger']); ?>
								<span><?php echo e(__('Voir toutes les actualités')); ?></span>
								<?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 sm:w-6 ml-1 transition-all md:arrow-move-effect']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
						</div>
					</section>

					<aside class="sm:col-span-2 lg:col-span-1">
						<h2 class="heading-2 uppercase"><?php echo e(__('Communiqués')); ?></h2>
						<div class="mt-2 sm:mt-4 md:mt-6">
							<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4 sm:gap-6 lg:gap-2 xl:gap-6">
								<?php if (isset($component)) { $__componentOriginal604c8b926ae758bd1673507cd66eeb7a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal604c8b926ae758bd1673507cd66eeb7a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mini-release','data' => ['title' => 'COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN','url' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mini-release'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN','url' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal604c8b926ae758bd1673507cd66eeb7a)): ?>
<?php $attributes = $__attributesOriginal604c8b926ae758bd1673507cd66eeb7a; ?>
<?php unset($__attributesOriginal604c8b926ae758bd1673507cd66eeb7a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal604c8b926ae758bd1673507cd66eeb7a)): ?>
<?php $component = $__componentOriginal604c8b926ae758bd1673507cd66eeb7a; ?>
<?php unset($__componentOriginal604c8b926ae758bd1673507cd66eeb7a); ?>
<?php endif; ?>
	
								<?php if (isset($component)) { $__componentOriginal604c8b926ae758bd1673507cd66eeb7a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal604c8b926ae758bd1673507cd66eeb7a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mini-release','data' => ['title' => 'COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN','url' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mini-release'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN','url' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal604c8b926ae758bd1673507cd66eeb7a)): ?>
<?php $attributes = $__attributesOriginal604c8b926ae758bd1673507cd66eeb7a; ?>
<?php unset($__attributesOriginal604c8b926ae758bd1673507cd66eeb7a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal604c8b926ae758bd1673507cd66eeb7a)): ?>
<?php $component = $__componentOriginal604c8b926ae758bd1673507cd66eeb7a; ?>
<?php unset($__componentOriginal604c8b926ae758bd1673507cd66eeb7a); ?>
<?php endif; ?>
	
								<?php if (isset($component)) { $__componentOriginal604c8b926ae758bd1673507cd66eeb7a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal604c8b926ae758bd1673507cd66eeb7a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mini-release','data' => ['title' => 'COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN','url' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mini-release'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN','url' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal604c8b926ae758bd1673507cd66eeb7a)): ?>
<?php $attributes = $__attributesOriginal604c8b926ae758bd1673507cd66eeb7a; ?>
<?php unset($__attributesOriginal604c8b926ae758bd1673507cd66eeb7a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal604c8b926ae758bd1673507cd66eeb7a)): ?>
<?php $component = $__componentOriginal604c8b926ae758bd1673507cd66eeb7a; ?>
<?php unset($__componentOriginal604c8b926ae758bd1673507cd66eeb7a); ?>
<?php endif; ?>
	
								<?php if (isset($component)) { $__componentOriginal604c8b926ae758bd1673507cd66eeb7a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal604c8b926ae758bd1673507cd66eeb7a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mini-release','data' => ['title' => 'COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN','url' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mini-release'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'COMMUNIQUE PORTANT DEPOT DE PRODUITS D’EXPERTISE A L’APEN','url' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal604c8b926ae758bd1673507cd66eeb7a)): ?>
<?php $attributes = $__attributesOriginal604c8b926ae758bd1673507cd66eeb7a; ?>
<?php unset($__attributesOriginal604c8b926ae758bd1673507cd66eeb7a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal604c8b926ae758bd1673507cd66eeb7a)): ?>
<?php $component = $__componentOriginal604c8b926ae758bd1673507cd66eeb7a; ?>
<?php unset($__componentOriginal604c8b926ae758bd1673507cd66eeb7a); ?>
<?php endif; ?>
								
							</div>

							<div class="mt-4 md:mt-6">
								<?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['variant' => 'outline','size' => 'lg','component' => 'a','href' => '#','class' => 'w-full sm:w-auto arrow-move-trigger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline','size' => 'lg','component' => 'a','href' => '#','class' => 'w-full sm:w-auto arrow-move-trigger']); ?>
									<span><?php echo e(__('Voir tous les communiqués')); ?></span>
									<?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 sm:w-6 ml-1 transition-all md:arrow-move-effect']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
								 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
							</div>
						</div>
					</aside>
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
<?php /**PATH /home/abubakr/Bureau/apen/resources/views/pages/home.blade.php ENDPATH**/ ?>