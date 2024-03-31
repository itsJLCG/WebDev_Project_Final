<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'theme' => '',
    'class' => '',
    'column' => null,
    'inline' => null,
    'filter' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'theme' => '',
    'class' => '',
    'column' => null,
    'inline' => null,
    'filter' => null,
]); ?>
<?php foreach (array_filter(([
    'theme' => '',
    'class' => '',
    'column' => null,
    'inline' => null,
    'filter' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $field = data_get($filter, 'field');
    $title = data_get($column, 'title');

    $defaultAttributes = \PowerComponents\LivewirePowerGrid\Components\Filters\FilterSelect::getWireAttributes($field, $title);

    $filterClasses = \Illuminate\Support\Arr::toCssClasses([data_get($theme, 'selectClass'), $class, data_get($column, 'headerClass'), 'power_grid']);

    $params = array_merge([...data_get($filter, 'attributes'), ...$defaultAttributes], $filter);
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
    <div
        class="<?php echo e(data_get($theme, 'baseClass')); ?>"
        style="<?php echo e(data_get($theme, 'baseStyle')); ?>"
    >
        <?php if(!$inline): ?>
            <label class="block text-sm font-medium text-pg-primary-700 dark:text-pg-primary-300">
                <?php echo e($title); ?>

            </label>
        <?php endif; ?>
        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['pt-1' => !$inline, 'relative']); ?>">
            <select
                class="<?php echo e($filterClasses); ?>"
                style="<?php echo e(data_get($column, 'headerStyle')); ?>"
                <?php echo e($defaultAttributes['selectAttributes']); ?>

            >
                <option value=""><?php echo e(trans('livewire-powergrid::datatable.select.all')); ?></option>

                <?php
                    $computedDatasource = data_get($filter, 'computedDatasource');
                    $dataSource = filled($computedDatasource)
                        ? $this->{$computedDatasource}
                        : data_get($filter, 'dataSource');
                ?>

                <?php $__currentLoopData = $dataSource; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                        wire:key="select-<?php echo e($tableName); ?>-<?php echo e($key); ?>"
                        value="<?php echo e($item[data_get($filter, 'optionValue')]); ?>"
                    >
                        <?php echo e($item[data_get($filter, 'optionLabel')]); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div
                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-pg-primary-700 dark:text-pg-primary-300">
                <?php if (isset($component)) { $__componentOriginal0fd0aee7f7ebcb95e3693513ac55802a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0fd0aee7f7ebcb95e3693513ac55802a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.icons.down','data' => ['class' => 'w-4 h-4 dark:text-gray-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::icons.down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 dark:text-gray-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0fd0aee7f7ebcb95e3693513ac55802a)): ?>
<?php $attributes = $__attributesOriginal0fd0aee7f7ebcb95e3693513ac55802a; ?>
<?php unset($__attributesOriginal0fd0aee7f7ebcb95e3693513ac55802a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0fd0aee7f7ebcb95e3693513ac55802a)): ?>
<?php $component = $__componentOriginal0fd0aee7f7ebcb95e3693513ac55802a; ?>
<?php unset($__componentOriginal0fd0aee7f7ebcb95e3693513ac55802a); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\vendor\power-components\livewire-powergrid\resources\views\components\frameworks\tailwind\filters\select.blade.php ENDPATH**/ ?>