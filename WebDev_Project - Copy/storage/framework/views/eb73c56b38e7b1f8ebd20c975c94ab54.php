<div class="md:flex md:flex-row w-full">
    <div>
        <?php if (isset($component)) { $__componentOriginalf0e03754081d927a8d06cab3ab99f3f3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf0e03754081d927a8d06cab3ab99f3f3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.frameworks.tailwind.header.actions','data' => ['theme' => $theme,'actions' => $this->headers]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::frameworks.tailwind.header.actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['theme' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($theme),'actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->headers)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf0e03754081d927a8d06cab3ab99f3f3)): ?>
<?php $attributes = $__attributesOriginalf0e03754081d927a8d06cab3ab99f3f3; ?>
<?php unset($__attributesOriginalf0e03754081d927a8d06cab3ab99f3f3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf0e03754081d927a8d06cab3ab99f3f3)): ?>
<?php $component = $__componentOriginalf0e03754081d927a8d06cab3ab99f3f3; ?>
<?php unset($__componentOriginalf0e03754081d927a8d06cab3ab99f3f3); ?>
<?php endif; ?>
    </div>
    <div class="flex flex-row justify-center items-center text-sm">
        <?php if(count($exportOptions) > 0): ?>
            <div class="mr-2 mt-2 sm:mt-0">
                <?php echo $__env->make(powerGridThemeRoot() . '.export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
        <?php if ($__env->exists(powerGridThemeRoot() . '.toggle-columns')) echo $__env->make(powerGridThemeRoot() . '.toggle-columns', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <!-- LOADING -->
    <?php echo $__env->make(powerGridThemeRoot() . '.loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\vendor\power-components\livewire-powergrid\resources\views\components\frameworks\tailwind\actions.blade.php ENDPATH**/ ?>