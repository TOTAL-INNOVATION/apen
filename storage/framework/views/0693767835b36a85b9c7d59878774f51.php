<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((["showOnHover" => false]));

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

foreach (array_filter((["showOnHover" => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $actionClass = $showOnHover ? "[--trigger:hover]" : "[--trigger:click]";
?>

<div <?php echo e($attributes->twMerge("m-1 hs-dropdown relative", $actionClass)); ?>>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /home/abubakr/Bureau/apen/resources/views/components/dropdown/index.blade.php ENDPATH**/ ?>