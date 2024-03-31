<?php if(data_get($setUp, 'header.toggleColumns')): ?>
    <div
        x-data="{ open: false }"
        class="mr-2 mt-2 sm:mt-0"
        @click.outside="open = false"
    >
        <button
            @click.prevent="open = ! open"
            class="pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700
    dark:ring-offset-pg-primary-800 dark:text-pg-primary-400 dark:bg-pg-primary-700"
        >
            <div class="flex">
                <?php if (isset($component)) { $__componentOriginal491d64c78bef44602650443184da8c52 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal491d64c78bef44602650443184da8c52 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.icons.eye-off','data' => ['class' => 'w-5 h-5 text-pg-primary-500 dark:text-pg-primary-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::icons.eye-off'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 text-pg-primary-500 dark:text-pg-primary-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal491d64c78bef44602650443184da8c52)): ?>
<?php $attributes = $__attributesOriginal491d64c78bef44602650443184da8c52; ?>
<?php unset($__attributesOriginal491d64c78bef44602650443184da8c52); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal491d64c78bef44602650443184da8c52)): ?>
<?php $component = $__componentOriginal491d64c78bef44602650443184da8c52; ?>
<?php unset($__componentOriginal491d64c78bef44602650443184da8c52); ?>
<?php endif; ?>
            </div>
        </button>

        <div
            x-cloak
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute z-10 mt-2 w-56 rounded-md dark:bg-pg-primary-700 bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            tabindex="-1"
            @keydown.tab="open = false"
            @keydown.enter.prevent="open = false;"
            @keyup.space.prevent="open = false;"
        >
            <div
                role="none"
            >
                <?php $__currentLoopData = $this->visibleColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div
                        wire:click="$dispatch('pg:toggleColumn-<?php echo e($tableName); ?>', { field: '<?php echo e(data_get($column, 'field')); ?>'})"
                        wire:key="toggle-column-<?php echo e(data_get($column, 'field')); ?>"
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'font-semibold bg-pg-primary-100 dark:bg-pg-primary-800 ' => data_get($column, 'hidden'),
                            'py-1' => $loop->first || $loop->last,
                            ' cursor-pointer text-sm flex justify-start block px-4 py-2 text-pg-primary-800 hover:bg-pg-primary-100 hover:text-black-300 dark:text-pg-primary-200 dark:hover:bg-pg-primary-800'
                        ]); ?>"
                    >
                        <?php if(!data_get($column, 'hidden')): ?>
                            <?php if (isset($component)) { $__componentOriginal44e829c8d9d7b7526c011eb87286160d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal44e829c8d9d7b7526c011eb87286160d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.icons.eye','data' => ['class' => 'text-pg-primary-500 dark:text-pg-primary-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::icons.eye'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-pg-primary-500 dark:text-pg-primary-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal44e829c8d9d7b7526c011eb87286160d)): ?>
<?php $attributes = $__attributesOriginal44e829c8d9d7b7526c011eb87286160d; ?>
<?php unset($__attributesOriginal44e829c8d9d7b7526c011eb87286160d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44e829c8d9d7b7526c011eb87286160d)): ?>
<?php $component = $__componentOriginal44e829c8d9d7b7526c011eb87286160d; ?>
<?php unset($__componentOriginal44e829c8d9d7b7526c011eb87286160d); ?>
<?php endif; ?>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginal491d64c78bef44602650443184da8c52 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal491d64c78bef44602650443184da8c52 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.icons.eye-off','data' => ['class' => 'text-pg-primary-500 dark:text-pg-primary-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::icons.eye-off'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-pg-primary-500 dark:text-pg-primary-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal491d64c78bef44602650443184da8c52)): ?>
<?php $attributes = $__attributesOriginal491d64c78bef44602650443184da8c52; ?>
<?php unset($__attributesOriginal491d64c78bef44602650443184da8c52); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal491d64c78bef44602650443184da8c52)): ?>
<?php $component = $__componentOriginal491d64c78bef44602650443184da8c52; ?>
<?php unset($__componentOriginal491d64c78bef44602650443184da8c52); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <div class="ml-2">
                            <?php echo data_get($column, 'title'); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\frameworks\tailwind\header\toggle-columns.blade.php ENDPATH**/ ?>