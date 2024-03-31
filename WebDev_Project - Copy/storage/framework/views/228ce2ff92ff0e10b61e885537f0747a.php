<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'sum' => null,
    'labelSum' => null,
    'count' => null,
    'labelCount' => null,
    'min' => null,
    'labelMin' => null,
    'max' => null,
    'labelMax' => null,
    'avg' => null,
    'labelAvg' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'sum' => null,
    'labelSum' => null,
    'count' => null,
    'labelCount' => null,
    'min' => null,
    'labelMin' => null,
    'max' => null,
    'labelMax' => null,
    'avg' => null,
    'labelAvg' => null,
]); ?>
<?php foreach (array_filter(([
    'sum' => null,
    'labelSum' => null,
    'count' => null,
    'labelCount' => null,
    'min' => null,
    'labelMin' => null,
    'max' => null,
    'labelMax' => null,
    'avg' => null,
    'labelAvg' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div>
    <?php if($sum): ?>
        <span><?php echo $labelSum; ?>: <?php echo e($sum); ?></span>
        <br>
    <?php endif; ?>

    <?php if($count): ?>
        <span><?php echo $labelCount; ?>: <?php echo e($count); ?></span>
        <br>
    <?php endif; ?>
    <?php if($min): ?>
        <span><?php echo $labelMin; ?>: <?php echo e($min); ?></span>
        <br>
    <?php endif; ?>

    <?php if($max): ?>
        <span><?php echo $labelMax; ?>: <?php echo e($max); ?></span>
        <br>
    <?php endif; ?>

    <?php if($avg): ?>
        <span><?php echo $labelAvg; ?>: <?php echo e($avg); ?></span>
        <br>
    <?php endif; ?>
</div>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\summarize.blade.php ENDPATH**/ ?>