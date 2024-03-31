<td
    class="<?php echo e(data_get($theme, 'tdBodyClass')); ?>"
    style="<?php echo e(data_get($theme, 'tdBodyStyle')); ?>"
>
    <div
        class="cursor-pointer"
        x-on:click.prevent="$wire.toggleDetail('<?php echo e($row->{$primaryKey}); ?>')"
    >
        <?php if ($__env->exists(data_get($setUp, 'detail.viewIcon'))) echo $__env->make(data_get($setUp, 'detail.viewIcon'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if(!data_get($setUp, 'detail.viewIcon')): ?>
            <?php if (isset($component)) { $__componentOriginala9a1a3fbd29f77413ac389af21d329ee = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala9a1a3fbd29f77413ac389af21d329ee = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.icons.arrow','data' => ['class' => 'text-pg-primary-600 w-5 h-5 transition-all duration-300 dark:text-pg-primary-200','xBind:class' => 'detailState ? \'rotate-90\' : \'-rotate-0\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::icons.arrow'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-pg-primary-600 w-5 h-5 transition-all duration-300 dark:text-pg-primary-200','x-bind:class' => 'detailState ? \'rotate-90\' : \'-rotate-0\'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala9a1a3fbd29f77413ac389af21d329ee)): ?>
<?php $attributes = $__attributesOriginala9a1a3fbd29f77413ac389af21d329ee; ?>
<?php unset($__attributesOriginala9a1a3fbd29f77413ac389af21d329ee); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala9a1a3fbd29f77413ac389af21d329ee)): ?>
<?php $component = $__componentOriginala9a1a3fbd29f77413ac389af21d329ee; ?>
<?php unset($__componentOriginala9a1a3fbd29f77413ac389af21d329ee); ?>
<?php endif; ?>
        <?php endif; ?>
    </div>
</td>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\vendor\power-components\livewire-powergrid\resources\views\components\frameworks\tailwind\toggle-detail.blade.php ENDPATH**/ ?>