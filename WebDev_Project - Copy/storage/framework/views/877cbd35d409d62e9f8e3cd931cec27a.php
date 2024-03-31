<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'theme' => '',
    'inline' => null,
    'filter' => null,
    'column' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'theme' => '',
    'inline' => null,
    'filter' => null,
    'column' => '',
]); ?>
<?php foreach (array_filter(([
    'theme' => '',
    'inline' => null,
    'filter' => null,
    'column' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $fieldClassName = data_get($filter, 'className');
    $field = data_get($filter, 'field');

    $componentAttributes = (array) data_get($filter, 'attributes');

    $defaultAttributes = $fieldClassName::getWireAttributes($field, array_merge($filter, (array)$column));

    $filterClasses = Arr::toCssClasses([data_get($theme, 'inputClass'), data_get($column, 'headerClass'), 'power_grid']);

    $params = array_merge([...data_get($filter, 'attributes'), ...$defaultAttributes, $filterClasses], $filter);
?>

<?php if($params['component']): ?>
    <?php unset($params['attributes']); ?>

    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $params['component']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => new \Illuminate\View\ComponentAttributeBag($params)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php else: ?>
    <div>
        <?php if(!$inline): ?>
            <label class="block text-sm font-medium text-pg-primary-700 dark:text-pg-primary-300">
                <?php echo e($title); ?>

            </label>
        <?php endif; ?>
        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'sm:flex gap-3 w-full' => !$inline,
            'flex flex-col' => $inline,
        ]); ?>">
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['pl-0 pt-1 w-full sm:w-1/2' => !$inline]); ?>">
                <input
                    <?php echo e($defaultAttributes['inputStartAttributes']); ?>

                    style="<?php echo e(data_get($theme, 'inputStyle')); ?> <?php echo e(data_get($column, 'headerStyle')); ?>"
                    type="text"
                    class="<?php echo e($filterClasses); ?>"
                    placeholder="<?php echo e($placeholder['min'] ?? __('Min')); ?>"
                >
            </div>
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['pl-0 pt-1 w-full sm:w-1/2' => !$inline, 'mt-1' => $inline]); ?>">
                <input
                    <?php echo e($defaultAttributes['inputEndAttributes']); ?>

                    <?php if($inline): ?> style="<?php echo e(data_get($theme, 'inputStyle')); ?> <?php echo e(data_get($column, 'headerStyle')); ?>" <?php endif; ?>
                    type="text"
                    class="<?php echo e($filterClasses); ?>"
                    placeholder="<?php echo e($placeholder['max'] ?? __('Max')); ?>"
                >
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\frameworks\tailwind\filters\number.blade.php ENDPATH**/ ?>