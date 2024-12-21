<div class="w-full bg-white hidden md:flex">
    <div class="px-4 py-1.5 flex-initial bg-secondary text-sm font-franklin-medium text-white uppercase border-b border-secondary">
        <?php echo e(__('Flash info')); ?>

    </div>
    <div class="py-1.5 flex-1 border-b border-whisper overflow-x-hidden">
        <div class="w-full text-nowrap animate-text-x-scroll">Agence de promotion de l’expertise nationale : 1ère session de l’Assemblée Générale des Experts tenue le 09 décembre 2022</div>
    </div>
</div>
<header class="w-full bg-white sticky top-0 z-50">
    
    <div class="py-2 border-b border-whisper">
        <div class="px-4 sm:px-auto container flex items-center justify-between md:px-0 md:justify-normal">
            <div class="flex-initial">
                <a class="outline-none" href="#">
                    <img src="<?php echo e(asset('logo.png')); ?>" class="w-16 sm:w-20 md:w-24" alt="<?php echo e(config('app.name')); ?>">
                </a>
            </div>
            <div class="hidden md:block flex-1"> 
                <div class="heading-2 text-primary uppercase text-center">
                    <span><?php echo e(__('Agence de Promotion')); ?></span><br>
                    <span><?php echo e(__('de l’Expertise Nationale')); ?></span>
                </div>
            </div>
            <div class="flex-initial">
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['component' => 'a','href' => ''.e(route('login.view')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['component' => 'a','href' => ''.e(route('login.view')).'']); ?><?php echo e(__('Se connecter')); ?> <?php echo $__env->renderComponent(); ?>
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
    </div>

    <div class="hidden md:block border-b border-whisper">
        <div class="md:w-full md:webkit-scrollbar-none md:overflow-x-scroll md:mx-auto lg:w-fit">
            <?php if (isset($component)) { $__componentOriginalff09156f73c896030ee75284e9b2c466 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff09156f73c896030ee75284e9b2c466 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.index','data' => ['class' => 'py-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'py-0']); ?>
                <?php if (isset($component)) { $__componentOriginald92def5a79dfb886f0113307a042d5f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald92def5a79dfb886f0113307a042d5f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.custom-link','data' => ['href' => ''.e(route('home')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.custom-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('home')).'']); ?><?php echo e(__('Accueil')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald92def5a79dfb886f0113307a042d5f4)): ?>
<?php $attributes = $__attributesOriginald92def5a79dfb886f0113307a042d5f4; ?>
<?php unset($__attributesOriginald92def5a79dfb886f0113307a042d5f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald92def5a79dfb886f0113307a042d5f4)): ?>
<?php $component = $__componentOriginald92def5a79dfb886f0113307a042d5f4; ?>
<?php unset($__componentOriginald92def5a79dfb886f0113307a042d5f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown.index','data' => ['class' => 'm-0','showOnHover' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'm-0','showOnHover' => true]); ?>
                    <?php if (isset($component)) { $__componentOriginal8e272de2404db061f67170aca95a529d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8e272de2404db061f67170aca95a529d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown.trigger','data' => ['class' => 'px-4 py-2.5 h-full text-base text-nowrap inline-flex justify-center items-center gap-x-1 cursor-pointer border-0 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:bg-primary after:transition-all hover:bg-transparent hover:after:navlink-hover-effect']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-4 py-2.5 h-full text-base text-nowrap inline-flex justify-center items-center gap-x-1 cursor-pointer border-0 after:absolute after:left-0 after:bottom-0 after:h-[2px] after:bg-primary after:transition-all hover:bg-transparent hover:after:navlink-hover-effect']); ?>
                        <span><?php echo e(__('À propos')); ?></span>
                        <?php if (isset($component)) { $__componentOriginal44b5a6beee0bfb7ceed8aeaa42a00842 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal44b5a6beee0bfb7ceed8aeaa42a00842 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown.icon','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal44b5a6beee0bfb7ceed8aeaa42a00842)): ?>
<?php $attributes = $__attributesOriginal44b5a6beee0bfb7ceed8aeaa42a00842; ?>
<?php unset($__attributesOriginal44b5a6beee0bfb7ceed8aeaa42a00842); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44b5a6beee0bfb7ceed8aeaa42a00842)): ?>
<?php $component = $__componentOriginal44b5a6beee0bfb7ceed8aeaa42a00842; ?>
<?php unset($__componentOriginal44b5a6beee0bfb7ceed8aeaa42a00842); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8e272de2404db061f67170aca95a529d)): ?>
<?php $attributes = $__attributesOriginal8e272de2404db061f67170aca95a529d; ?>
<?php unset($__attributesOriginal8e272de2404db061f67170aca95a529d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e272de2404db061f67170aca95a529d)): ?>
<?php $component = $__componentOriginal8e272de2404db061f67170aca95a529d; ?>
<?php unset($__componentOriginal8e272de2404db061f67170aca95a529d); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal5ea315118cc2f362429109ced47f28e1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5ea315118cc2f362429109ced47f28e1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown.content','data' => ['class' => 'p-0 m-0 border-whisper rounded-none']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-0 m-0 border-whisper rounded-none']); ?>
                        <?php if (isset($component)) { $__componentOriginal645f1992e5c1b87f1ae647b206b715cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645f1992e5c1b87f1ae647b206b715cb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown.item','data' => ['href' => ''.e(route('whoWeAre')).'','size' => 'default','class' => 'font-normal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('whoWeAre')).'','size' => 'default','class' => 'font-normal']); ?>
                            <?php echo e(__('Qui sommes-nous?')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal645f1992e5c1b87f1ae647b206b715cb)): ?>
<?php $attributes = $__attributesOriginal645f1992e5c1b87f1ae647b206b715cb; ?>
<?php unset($__attributesOriginal645f1992e5c1b87f1ae647b206b715cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal645f1992e5c1b87f1ae647b206b715cb)): ?>
<?php $component = $__componentOriginal645f1992e5c1b87f1ae647b206b715cb; ?>
<?php unset($__componentOriginal645f1992e5c1b87f1ae647b206b715cb); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal645f1992e5c1b87f1ae647b206b715cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645f1992e5c1b87f1ae647b206b715cb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown.item','data' => ['href' => ''.e(route('secretaryWords')).'','size' => 'default','class' => 'font-normal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('secretaryWords')).'','size' => 'default','class' => 'font-normal']); ?>
                            <?php echo e(__('Mot de la secrétaire exécutive')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal645f1992e5c1b87f1ae647b206b715cb)): ?>
<?php $attributes = $__attributesOriginal645f1992e5c1b87f1ae647b206b715cb; ?>
<?php unset($__attributesOriginal645f1992e5c1b87f1ae647b206b715cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal645f1992e5c1b87f1ae647b206b715cb)): ?>
<?php $component = $__componentOriginal645f1992e5c1b87f1ae647b206b715cb; ?>
<?php unset($__componentOriginal645f1992e5c1b87f1ae647b206b715cb); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal645f1992e5c1b87f1ae647b206b715cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal645f1992e5c1b87f1ae647b206b715cb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown.item','data' => ['href' => ''.e(route('decrees')).'','size' => 'default','class' => 'font-normal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('decrees')).'','size' => 'default','class' => 'font-normal']); ?>
                            <?php echo e(__('Textes reglémentaires')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal645f1992e5c1b87f1ae647b206b715cb)): ?>
<?php $attributes = $__attributesOriginal645f1992e5c1b87f1ae647b206b715cb; ?>
<?php unset($__attributesOriginal645f1992e5c1b87f1ae647b206b715cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal645f1992e5c1b87f1ae647b206b715cb)): ?>
<?php $component = $__componentOriginal645f1992e5c1b87f1ae647b206b715cb; ?>
<?php unset($__componentOriginal645f1992e5c1b87f1ae647b206b715cb); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5ea315118cc2f362429109ced47f28e1)): ?>
<?php $attributes = $__attributesOriginal5ea315118cc2f362429109ced47f28e1; ?>
<?php unset($__attributesOriginal5ea315118cc2f362429109ced47f28e1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5ea315118cc2f362429109ced47f28e1)): ?>
<?php $component = $__componentOriginal5ea315118cc2f362429109ced47f28e1; ?>
<?php unset($__componentOriginal5ea315118cc2f362429109ced47f28e1); ?>
<?php endif; ?>
                    
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald92def5a79dfb886f0113307a042d5f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald92def5a79dfb886f0113307a042d5f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.custom-link','data' => ['href' => ''.e(route('becomeExpert.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.custom-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('becomeExpert.index')).'']); ?><?php echo e(__('Devenir expert')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald92def5a79dfb886f0113307a042d5f4)): ?>
<?php $attributes = $__attributesOriginald92def5a79dfb886f0113307a042d5f4; ?>
<?php unset($__attributesOriginald92def5a79dfb886f0113307a042d5f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald92def5a79dfb886f0113307a042d5f4)): ?>
<?php $component = $__componentOriginald92def5a79dfb886f0113307a042d5f4; ?>
<?php unset($__componentOriginald92def5a79dfb886f0113307a042d5f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald92def5a79dfb886f0113307a042d5f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald92def5a79dfb886f0113307a042d5f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.custom-link','data' => ['href' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.custom-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#']); ?><?php echo e(__('Contacter un expert')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald92def5a79dfb886f0113307a042d5f4)): ?>
<?php $attributes = $__attributesOriginald92def5a79dfb886f0113307a042d5f4; ?>
<?php unset($__attributesOriginald92def5a79dfb886f0113307a042d5f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald92def5a79dfb886f0113307a042d5f4)): ?>
<?php $component = $__componentOriginald92def5a79dfb886f0113307a042d5f4; ?>
<?php unset($__componentOriginald92def5a79dfb886f0113307a042d5f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald92def5a79dfb886f0113307a042d5f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald92def5a79dfb886f0113307a042d5f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.custom-link','data' => ['href' => ''.e(route('news')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.custom-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('news')).'']); ?><?php echo e(__('Actualités')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald92def5a79dfb886f0113307a042d5f4)): ?>
<?php $attributes = $__attributesOriginald92def5a79dfb886f0113307a042d5f4; ?>
<?php unset($__attributesOriginald92def5a79dfb886f0113307a042d5f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald92def5a79dfb886f0113307a042d5f4)): ?>
<?php $component = $__componentOriginald92def5a79dfb886f0113307a042d5f4; ?>
<?php unset($__componentOriginald92def5a79dfb886f0113307a042d5f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginald92def5a79dfb886f0113307a042d5f4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald92def5a79dfb886f0113307a042d5f4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav.custom-link','data' => ['href' => ''.e(route('contacts')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav.custom-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('contacts')).'']); ?><?php echo e(__('Contacts')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald92def5a79dfb886f0113307a042d5f4)): ?>
<?php $attributes = $__attributesOriginald92def5a79dfb886f0113307a042d5f4; ?>
<?php unset($__attributesOriginald92def5a79dfb886f0113307a042d5f4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald92def5a79dfb886f0113307a042d5f4)): ?>
<?php $component = $__componentOriginald92def5a79dfb886f0113307a042d5f4; ?>
<?php unset($__componentOriginald92def5a79dfb886f0113307a042d5f4); ?>
<?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff09156f73c896030ee75284e9b2c466)): ?>
<?php $attributes = $__attributesOriginalff09156f73c896030ee75284e9b2c466; ?>
<?php unset($__attributesOriginalff09156f73c896030ee75284e9b2c466); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff09156f73c896030ee75284e9b2c466)): ?>
<?php $component = $__componentOriginalff09156f73c896030ee75284e9b2c466; ?>
<?php unset($__componentOriginalff09156f73c896030ee75284e9b2c466); ?>
<?php endif; ?>
        </div>
    </div>

</header>
<?php /**PATH /home/abubakr/Bureau/apen/resources/views/components/header.blade.php ENDPATH**/ ?>