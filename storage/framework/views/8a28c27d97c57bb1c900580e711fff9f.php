<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    /* direction must be either vertical or horizontal */
    'direction' => 'horinzontal',
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
    /* direction must be either vertical or horizontal */
    'direction' => 'horinzontal',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<nav
    <?php echo e($attributes->twMerge(['flex', $direction === 'horinzontal' ? 'space-x-2 py-2' : 'flex-col space-y-2'])); ?>>
    <?php echo e($slot); ?>

</nav>
<?php /**PATH /home/abubakr/Bureau/apen/resources/views/components/nav/index.blade.php ENDPATH**/ ?>