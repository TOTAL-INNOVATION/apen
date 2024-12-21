<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => '',
    'description' => '',
    'coverSrc' => '#',
    'url' => '#',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'title' => '',
    'description' => '',
    'coverSrc' => '#',
    'url' => '#',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="min-h-64 sm:h-full bg-cover bg-center slide" style="background-image: url(<?php echo e($coverSrc); ?>)">
    <div class="w-full h-full bg-dark/60">
        <div class="h-full px-4 sm:px-auto container pb-4 sm:pb-6 md:pb-8 lg:pb-12 flex flex-col justify-end">
            <div>
                <a href="<?php echo e($url); ?>" class="flex flex-col arrow-move-trigger">
                    <div class="text-3xl md:text-4xl lg:text-5xl text-white font-texta-black uppercase"><?php echo e(Str::limit($title, 40)); ?></div>
                    <div class="mt-2 sm:mt-4 md:mt-6 md:w-8/12 lg:w-6/12 text-whisper">
                        <span>
                            <?php echo e(Str::limit($description, 150)); ?>

                        </span>
                        <span class="inline-flex items-end">
                            <span class=" font-franklin-medium"><?php echo e(__('Lire')); ?></span>
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 ml-1 transition-all md:arrow-move-effect']); ?>
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
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/abubakr/Bureau/apen/resources/views/components/news-slide.blade.php ENDPATH**/ ?>