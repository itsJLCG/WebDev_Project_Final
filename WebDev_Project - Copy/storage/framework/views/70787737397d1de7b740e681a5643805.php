<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'theme' => '',
    'inline' => true,
    'filter' => null,
    'tableName' => null,
    'multiple' => true,
    'initialValues' => [],
    'title' => ''
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'theme' => '',
    'inline' => true,
    'filter' => null,
    'tableName' => null,
    'multiple' => true,
    'initialValues' => [],
    'title' => ''
]); ?>
<?php foreach (array_filter(([
    'theme' => '',
    'inline' => true,
    'filter' => null,
    'tableName' => null,
    'multiple' => true,
    'initialValues' => [],
    'title' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $framework = config('livewire-powergrid.plugins.select');
    $collection = collect();

    if (filled(data_get($filter, 'dataSource'))) {
        $collection = collect(data_get($filter, 'dataSource'))
            ->transform(function (array|\Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Model $entry) use ($filter) {
                if (is_array($entry)) {
                    $entry = collect($entry);
                }
            return $entry->only([data_get($filter, 'optionValue'), data_get($filter, 'optionLabel')]);
        });
    } elseif (filled(data_get($filter, 'computedDatasource'))) {
        $collection = collect(data_get($filter, 'computedDatasource'))
            ->transform(function (array|\Illuminate\Support\Collection|\Illuminate\Database\Eloquent\Model $entry) use ($filter) {
                if (is_array($entry)) {
                    $entry = collect($entry);
                }
            return $entry->only([data_get($filter, 'optionValue'), data_get($filter, 'optionLabel')]);
        });
    }

    $params = [
        'tableName' => $tableName,
        'label' => $title,
        'dataField' => data_get($filter, 'field'),
        'optionValue' => data_get($filter, 'optionValue'),
        'optionLabel' => data_get($filter, 'optionLabel'),
        'initialValues' => $initialValues,
        'framework' => $framework[config('livewire-powergrid.plugins.select.default')],
    ];

    if (\Illuminate\Support\Arr::has($filter, ['url', 'method'])) {
        $params['asyncData'] = [
            'url' => data_get($filter, 'url'),
            'method' => data_get($filter, 'method'),
            'parameters' => data_get($filter, 'parameters'),
            'headers' => data_get($filter, 'headers'),
        ];
    }

    $alpineData = $framework['default'] == 'tom' ? 'pgTomSelect(' . \Illuminate\Support\Js::from($params) . ')' : 'pgSlimSelect(' . \Illuminate\Support\Js::from($params) . ')';
?>
<div
    x-cloak
    wire:ignore
    x-data="<?php echo e($alpineData); ?>"
>
    <?php if(filled($filter)): ?>
        <div
            class="<?php echo e(data_get($theme, 'baseClass')); ?>"
            style="<?php echo e(data_get($theme, 'baseStyle')); ?>"
        >
            <?php if(!$inline): ?>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">
                    <?php echo e($title); ?>

                </label>
            <?php endif; ?>
            <select
                <?php if($multiple): ?> multiple <?php endif; ?>
                class="<?php echo e(data_get($theme, 'selectClass')); ?>"
                wire:model="filters.multi_select.<?php echo e(data_get($filter, 'field')); ?>.values"
                x-ref="select_picker_<?php echo e(data_get($filter, 'field')); ?>_<?php echo e($tableName); ?>"
            >
                <option value=""><?php echo e(trans('livewire-powergrid::datatable.multi_select.all')); ?></option>
                <?php if(blank(data_get($params, 'asyncData', []))): ?>
                    <?php $__currentLoopData = $collection->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option wire:key="multi-select-option-<?php echo e($loop->index); ?>"
                                value="<?php echo e(data_get($item, data_get($filter, 'optionValue'))); ?>">
                            <?php echo e(data_get($item, data_get($filter, 'optionLabel'))); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </select>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\inputs\select.blade.php ENDPATH**/ ?>