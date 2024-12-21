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
		 <?php $__env->slot('title', null, []); ?> <?php echo e(__('C\'est quoi APEN?')); ?> <?php $__env->endSlot(); ?>
		<meta name="description" content="Homepage">
	 <?php $__env->endSlot(); ?>

	<main class="py-4 sm:pb-6 md:pb-8 lg:pb-12">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb.item','data' => ['href' => '#','text' => ''.__('C\'est quoi APEN?').'','class' => 'font-franklin-medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#','text' => ''.__('C\'est quoi APEN?').'','class' => 'font-franklin-medium']); ?>
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
				<h2 class="heading-2 uppercase"><?php echo e(__('C\'est quoi APEN?')); ?></h2>
				<div class="mt-4 md:mt-6 lg:mt-8">
					<div>
						<img class="w-full object-cover object-center" src="https://placehold.co/600x300" alt="<?php echo e(__('Siège de l\'APEN')); ?>">
					</div>
					<div class="mt-4 md:mt-6 lg:mt-8 space-y-4 sm:text-lg xl:text-xl">
						<p><?php echo e(__('L\'APEN est un Etablissement Public de l’Etat à caractère Professionnel (EPEP). Elle est dotée de la personnalité  morale et de l\'autonomie financière. Elle est placée sous la tutelle  technique  du  Ministre   de l\'Industrie, du Commerce et de l\'Artisanat et financière du Ministre de l\'Economie et des Finances.')); ?></p>
						
						<p><?php echo e(__('L’A.P.E.N a pour mission d\'assurer l’organisation et la promotion de l\'expertise nationale. Elle est notamment chargée de : ')); ?></p>
						
						<ul class="space-y-2">

							<?php if (isset($component)) { $__componentOriginal995f88f0f0715232dcd135c0dc834541 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal995f88f0f0715232dcd135c0dc834541 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-list-item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('custom-list-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
								<?php echo e(__('gérer la stratégie de promotion de l\'expertise nationale; coordonner et superviser toutes les actions relatives à l\'exercice des professions d’expert;')); ?>

							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal995f88f0f0715232dcd135c0dc834541)): ?>
<?php $attributes = $__attributesOriginal995f88f0f0715232dcd135c0dc834541; ?>
<?php unset($__attributesOriginal995f88f0f0715232dcd135c0dc834541); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal995f88f0f0715232dcd135c0dc834541)): ?>
<?php $component = $__componentOriginal995f88f0f0715232dcd135c0dc834541; ?>
<?php unset($__componentOriginal995f88f0f0715232dcd135c0dc834541); ?>
<?php endif; ?>

							<?php if (isset($component)) { $__componentOriginal995f88f0f0715232dcd135c0dc834541 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal995f88f0f0715232dcd135c0dc834541 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-list-item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('custom-list-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
								<?php echo e(__('veiller à l\'application des règles d’éthique et de déontologie élaborées à la fois par la société d’expertise et l\'entreprise d\'expertise individuelle;')); ?>

							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal995f88f0f0715232dcd135c0dc834541)): ?>
<?php $attributes = $__attributesOriginal995f88f0f0715232dcd135c0dc834541; ?>
<?php unset($__attributesOriginal995f88f0f0715232dcd135c0dc834541); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal995f88f0f0715232dcd135c0dc834541)): ?>
<?php $component = $__componentOriginal995f88f0f0715232dcd135c0dc834541; ?>
<?php unset($__componentOriginal995f88f0f0715232dcd135c0dc834541); ?>
<?php endif; ?>

							<?php if (isset($component)) { $__componentOriginal995f88f0f0715232dcd135c0dc834541 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal995f88f0f0715232dcd135c0dc834541 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-list-item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('custom-list-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
								<?php echo e(__('entreprendre toutes études et recherches en vue  du renforcement de la capacité  opérationnelle  des experts nationaux;')); ?>

							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal995f88f0f0715232dcd135c0dc834541)): ?>
<?php $attributes = $__attributesOriginal995f88f0f0715232dcd135c0dc834541; ?>
<?php unset($__attributesOriginal995f88f0f0715232dcd135c0dc834541); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal995f88f0f0715232dcd135c0dc834541)): ?>
<?php $component = $__componentOriginal995f88f0f0715232dcd135c0dc834541; ?>
<?php unset($__componentOriginal995f88f0f0715232dcd135c0dc834541); ?>
<?php endif; ?>

							<?php if (isset($component)) { $__componentOriginal995f88f0f0715232dcd135c0dc834541 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal995f88f0f0715232dcd135c0dc834541 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-list-item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('custom-list-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
								<?php echo e(__('promouvoir une politique de partenariat avec l\'expertise étrangère;')); ?>

							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal995f88f0f0715232dcd135c0dc834541)): ?>
<?php $attributes = $__attributesOriginal995f88f0f0715232dcd135c0dc834541; ?>
<?php unset($__attributesOriginal995f88f0f0715232dcd135c0dc834541); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal995f88f0f0715232dcd135c0dc834541)): ?>
<?php $component = $__componentOriginal995f88f0f0715232dcd135c0dc834541; ?>
<?php unset($__componentOriginal995f88f0f0715232dcd135c0dc834541); ?>
<?php endif; ?>

							<?php if (isset($component)) { $__componentOriginal995f88f0f0715232dcd135c0dc834541 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal995f88f0f0715232dcd135c0dc834541 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-list-item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('custom-list-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
								<?php echo e(__('publier les avis de vacances des postes au niveau de la Fonction Publique Internationale et traiter les dossiers de candidatures y relatifs en relation avec les départements ministériels; entreprendre des concertations avec les autorités nationales  et les partenaires techniques et financiers pour tous problèmes relatifs à l\'expertise.')); ?>

							 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal995f88f0f0715232dcd135c0dc834541)): ?>
<?php $attributes = $__attributesOriginal995f88f0f0715232dcd135c0dc834541; ?>
<?php unset($__attributesOriginal995f88f0f0715232dcd135c0dc834541); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal995f88f0f0715232dcd135c0dc834541)): ?>
<?php $component = $__componentOriginal995f88f0f0715232dcd135c0dc834541; ?>
<?php unset($__componentOriginal995f88f0f0715232dcd135c0dc834541); ?>
<?php endif; ?>
						</ul>
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
<?php /**PATH /home/abubakr/Bureau/apen/resources/views/pages/whoWeAre.blade.php ENDPATH**/ ?>