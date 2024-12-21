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
		 <?php $__env->slot('title', null, []); ?> <?php echo e(__('Procédure d\'inscription')); ?> <?php $__env->endSlot(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb.item','data' => ['href' => ''.e(route('becomeExpert.index')).'','text' => ''.e(__('Devenir expert')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('becomeExpert.index')).'','text' => ''.e(__('Devenir expert')).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb.item','data' => ['href' => '#','text' => ''.__('Procédure d\'inscription').'','class' => 'font-franklin-medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#','text' => ''.__('Procédure d\'inscription').'','class' => 'font-franklin-medium']); ?>
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
				<h2 class="heading-2 uppercase"><?php echo e(__('Procédure d\'inscription')); ?></h2>

				<div class="mt-4 md:mt-6 lg:mt-8 space-y-4 sm:text-lg xl:text-xl">
					<p><?php echo e(__('Pour candidater pour l\'acquisition d\'un agrément d\'expert, vous devez:')); ?></p>
					
					<ul class="inline-flex flex-col space-y-2">
						<?php if (isset($component)) { $__componentOriginal995f88f0f0715232dcd135c0dc834541 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal995f88f0f0715232dcd135c0dc834541 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-list-item','data' => ['class' => 'cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('custom-list-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer']); ?>
							<?php if (isset($component)) { $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link','data' => ['href' => '#','class' => 'inline-flex items-center gap-x-1 text-primary underline underline-offset-4','target' => '__blank']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#','class' => 'inline-flex items-center gap-x-1 text-primary underline underline-offset-4','target' => '__blank']); ?>
								<span><?php echo e(__('Créer un compte')); ?></span>
								<?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-up-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5']); ?>
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
<?php if (isset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $attributes = $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $component = $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-list-item','data' => ['class' => 'cursor-pointer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('custom-list-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer']); ?>
							<?php if (isset($component)) { $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link','data' => ['href' => '#','class' => 'inline-flex items-center gap-x-1 text-primary underline underline-offset-4','target' => '__blank']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#','class' => 'inline-flex items-center gap-x-1 text-primary underline underline-offset-4','target' => '__blank']); ?>
								<span><?php echo e(__('Remplir le formulaire  de l\'agrément d’expert demandé')); ?></span>
								<?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-up-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5']); ?>
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
<?php if (isset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $attributes = $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $component = $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-list-item','data' => ['class' => 'font-franklin-regular']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('custom-list-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-franklin-regular']); ?>
							<span class="font-franklin-medium"><?php echo e(__('Payer les frais de dossier')); ?></span><br />
							<span><?php echo e(__('Les frais de dossiers de demande d’Agrément Catégorie A, B et C non remboursables s’élèvent à Quinze milles (15.200) franc CFA.')); ?></span><br>
							<span><?php echo e(__('Pour payer les frais de dossier de candidatures, deux options de paiement sont mises à votre disposition. La première option concerne les paiements par Orange Money et Moov Money. La deuxième option est le payement classique par virement bancaire sur le compte de l’APEN.')); ?></span>
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
<?php /**PATH /home/abubakr/Bureau/apen/resources/views/pages/becomeExpert/procedure.blade.php ENDPATH**/ ?>