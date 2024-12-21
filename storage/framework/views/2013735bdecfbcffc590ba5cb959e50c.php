<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'text',
    'name' => '',
    'size' => 'base',
    'placeholder' => '',
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
    'type' => 'text',
    'name' => '',
    'size' => 'base',
    'placeholder' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>


<?php
    $sizes = [
        'sm' => 'py-2 px-3 text-sm',
        'base' => 'py-3 px-4 text-base',
        'large' => 'p-4 sm:p-4.5 text-base',
    ];

    $classNames = [
        'flex h-10 w-full border border-whisper outline-transparent bg-white',
         $sizes[$size],
         'ring-offset-white file:border-0 file:bg-transparent file:font-franklin-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:border-transparent focus-visible:ring-offset-0 disabled:cursor-not-allowed disabled:opacity-50 transition-all',
	];
?>

<input
    type="<?php echo e($type); ?>"
    name="<?php echo e($name); ?>"
    placeholder="<?php echo e($placeholder); ?>"
    <?php echo e($attributes->twMerge($classNames)); ?>

/>
<?php /**PATH /home/abubakr/Bureau/apen/resources/views/components/input.blade.php ENDPATH**/ ?>