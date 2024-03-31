<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'theme' => null,
    'readyToLoad' => false,
    'items' => null,
    'lazy' => false,
    'tableName' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'theme' => null,
    'readyToLoad' => false,
    'items' => null,
    'lazy' => false,
    'tableName' => null,
]); ?>
<?php foreach (array_filter(([
    'theme' => null,
    'readyToLoad' => false,
    'items' => null,
    'lazy' => false,
    'tableName' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div <?php if(isset($this->setUp['responsive'])): ?> x-data="pgResponsive" <?php endif; ?>>
    <table
        id="table_base_<?php echo e($tableName); ?>"
        class="table power-grid-table <?php echo e(data_get($theme, 'table.tableClass')); ?>"
        style="<?php echo e(data_get($theme, 'tableStyle')); ?>"
    >
        <thead
            class="<?php echo e(data_get($theme, 'table.theadClass')); ?>"
            style="<?php echo e(data_get($theme, 'table.theadStyle')); ?>"
        >
            <?php echo e($header); ?>

        </thead>
        <?php if($readyToLoad): ?>
            <tbody
                class="<?php echo e(data_get($theme, 'table.tbodyClass')); ?>"
                style="<?php echo e(data_get($theme, 'table.tbodyStyle')); ?>"
            >
                <?php echo e($body); ?>

            </tbody>
        <?php else: ?>
            <tbody
                class="<?php echo e(data_get($theme, 'table.tbodyClass')); ?>"
                style="<?php echo e(data_get($theme, 'table.tbodyStyle')); ?>"
            >
                <?php echo e($loading); ?>

            </tbody>
        <?php endif; ?>
    </table>

    
    <?php if($this->canLoadMore && $lazy): ?>
        <div class="justify-center items-center" wire:loading.class="flex" wire:target="loadMore">
            <?php echo $__env->make(powerGridThemeRoot() . '.header.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div x-data="pgLoadMore"></div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\table-base.blade.php ENDPATH**/ ?>