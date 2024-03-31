<div
    wire:key="toggle-filters-<?php echo e($tableName); ?>')"
    id="toggle-filters"
    class="flex mr-2 mt-2 sm:mt-0 gap-3"
>
    <button
        wire:click="toggleFilters"
        type="button"
        class="pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700
    dark:ring-offset-pg-primary-800 dark:text-pg-primary-400 dark:bg-pg-primary-700"
    >
        <?php if (isset($component)) { $__componentOriginal741000299fce87de7e024358cf3b3f95 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal741000299fce87de7e024358cf3b3f95 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.icons.filter','data' => ['class' => 'h-4 w-4 text-pg-primary-500 dark:text-pg-primary-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::icons.filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4 text-pg-primary-500 dark:text-pg-primary-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal741000299fce87de7e024358cf3b3f95)): ?>
<?php $attributes = $__attributesOriginal741000299fce87de7e024358cf3b3f95; ?>
<?php unset($__attributesOriginal741000299fce87de7e024358cf3b3f95); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal741000299fce87de7e024358cf3b3f95)): ?>
<?php $component = $__componentOriginal741000299fce87de7e024358cf3b3f95; ?>
<?php unset($__componentOriginal741000299fce87de7e024358cf3b3f95); ?>
<?php endif; ?>
    </button>
</div>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\frameworks\tailwind\header\filters.blade.php ENDPATH**/ ?>