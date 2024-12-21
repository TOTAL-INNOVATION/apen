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
         <?php $__env->slot('title', null, []); ?> <?php echo e(__('Devenir expert')); ?> <?php $__env->endSlot(); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb.item','data' => ['href' => '#','text' => ''.e(__('Devenir expert')).'','class' => 'font-franklin-medium']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#','text' => ''.e(__('Devenir expert')).'','class' => 'font-franklin-medium']); ?>
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
            <h2 class="heading-2 uppercase"><?php echo e(__('Devenir expert')); ?></h2>

			<div class="mt-4 md:mt-6 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6">
				<?php if (isset($component)) { $__componentOriginal264a2a6e289bfbd3b054eb29a6b543f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal264a2a6e289bfbd3b054eb29a6b543f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.priority-card','data' => ['title' => ''.e(__('Conditions d’obtention de l’agrément d’expert')).'','imageSrc' => '#','href' => ''.e(route('becomeExpert.conditions')).'','withoutDescription' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('priority-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e(__('Conditions d’obtention de l’agrément d’expert')).'','imageSrc' => '#','href' => ''.e(route('becomeExpert.conditions')).'','withoutDescription' => true]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.priority-card','data' => ['title' => ''.__('Procédure d\'inscription pour un agrément').'','imageSrc' => '#','href' => ''.e(route('becomeExpert.procedure')).'','withoutDescription' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('priority-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.__('Procédure d\'inscription pour un agrément').'','imageSrc' => '#','href' => ''.e(route('becomeExpert.procedure')).'','withoutDescription' => true]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.priority-card','data' => ['title' => ''.__('Formulaire de candidature').'','imageSrc' => '#','href' => '#','withoutDescription' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('priority-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.__('Formulaire de candidature').'','imageSrc' => '#','href' => '#','withoutDescription' => true]); ?>
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
<?php /**PATH /home/abubakr/Bureau/apen/resources/views/pages/becomeExpert/index.blade.php ENDPATH**/ ?>