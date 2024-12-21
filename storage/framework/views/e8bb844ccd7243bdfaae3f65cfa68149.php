<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
	'type' => 'button',
	'size' => 'default',
	'variant' => 'primary',
	'href' => '#',
	'roundedFull' => false,
	'component' => 'button',
	'disabled' => false,
    'widthFull' => false,
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
	'type' => 'button',
	'size' => 'default',
	'variant' => 'primary',
	'href' => '#',
	'roundedFull' => false,
	'component' => 'button',
	'disabled' => false,
    'widthFull' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $bgColor = match($variant) {
        'secondary' => 'bg-secondary text-white hover:bg-opacity-90',
        'gold' => 'bg-gold text-dark hover:bg-opacity-90',
        'success' => 'bg-success hover:bg-opacity-90',
        'warning' => 'bg-warning text-dark hover:bg-opacity-90',
        'error' => 'bg-error text-white hover:bg-opacity-90',
        'outline' => 'text-dark bg-transparent border border-whisper hover:bg-bright/35',
        'viridian' => 'bg-viridian text-white hover:bg-opacity-90',
        'chocolate' => 'bg-chocolate text-white hover:bg-opacity-90',
        'dark' => 'bg-dark text-white hover:bg-opacity-90',
        default => 'bg-primary text-white hover:bg-opacity-90',
    };

    $sizes = [
        'default' => 'text-base h-10 px-4 py-2',
        'sm' => 'text-sm h-9 px-3',
        'lg' => 'text-base h-11 px-8',
        'icon' => 'h-10 w-10',
    ];

    $classNames = [
        $sizes[$size],
        $bgColor,
        $widthFull ? 'w-full' : '',
        'inline-flex items-center justify-center whitespace-nowrap transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-70 transition-colors',
        $roundedFull ? 'rounded-full' : '',
    ];
?>

<<?php echo e($component); ?>

<?php if('a' === $component): ?>
    href='<?php echo e($href); ?>'
<?php else: ?>
    type='<?php echo e($type); ?>'
<?php endif; ?>
<?php echo e($attributes->twMerge($classNames)); ?>

<?php if($disabled): echo 'disabled'; endif; ?>>
<?php echo e($slot); ?>

</<?php echo e($component); ?>>
<?php /**PATH /home/abubakr/Bureau/apen/resources/views/components/button.blade.php ENDPATH**/ ?>