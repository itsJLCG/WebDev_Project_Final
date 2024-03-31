<?php if(data_get($setUp, 'header.softDeletes')): ?>
    <div
        x-data="{ open: false }"
        class="mr-0 sm:mr-2 mt-2 sm:mt-0"
        @click.outside="open = false"
    >
        <button
            @click.prevent="open = ! open"
            class="pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700
    dark:ring-offset-pg-primary-800 dark:text-pg-primary-400 dark:bg-pg-primary-800"
        >
            <div class="flex">
                <?php if (isset($component)) { $__componentOriginalf86e8445c3b4b21e8fd571a52134e584 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf86e8445c3b4b21e8fd571a52134e584 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-powergrid::components.icons.trash','data' => ['class' => 'text-pg-primary-500 dark:text-pg-primary-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-powergrid::icons.trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-pg-primary-500 dark:text-pg-primary-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf86e8445c3b4b21e8fd571a52134e584)): ?>
<?php $attributes = $__attributesOriginalf86e8445c3b4b21e8fd571a52134e584; ?>
<?php unset($__attributesOriginalf86e8445c3b4b21e8fd571a52134e584); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf86e8445c3b4b21e8fd571a52134e584)): ?>
<?php $component = $__componentOriginalf86e8445c3b4b21e8fd571a52134e584; ?>
<?php unset($__componentOriginalf86e8445c3b4b21e8fd571a52134e584); ?>
<?php endif; ?>
            </div>
        </button>

        <div
            x-show="open"
            x-cloak
            x-transition:enter="transform duration-200"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transform duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="mt-2 py-2 w-48 bg-white shadow-xl absolute z-10 dark:bg-pg-primary-700"
        >

            <div
                x-on:click="$wire.dispatch('pg:softDeletes-<?php echo e($tableName); ?>', {softDeletes: ''}); open = false"
                class="cursor-pointer flex justify-start block px-4 py-2 text-pg-primary-800 hover:bg-pg-primary-50 hover:text-black-200 dark:text-pg-primary-200 dark:hover:bg-gray-900 dark:hover:bg-pg-primary-700"
            >
                <?php echo app('translator')->get('livewire-powergrid::datatable.soft_deletes.without_trashed'); ?>
            </div>
            <div
                x-on:click="$wire.dispatch('pg:softDeletes-<?php echo e($tableName); ?>', {softDeletes: 'withTrashed'}); open = false"
                class="cursor-pointer flex justify-start block px-4 py-2 text-pg-primary-800 hover:bg-pg-primary-50 hover:text-black-200 dark:text-pg-primary-200 dark:hover:bg-gray-900 dark:hover:bg-pg-primary-700"
            >
                <?php echo app('translator')->get('livewire-powergrid::datatable.soft_deletes.with_trashed'); ?>
            </div>
            <div
                x-on:click="$wire.dispatch('pg:softDeletes-<?php echo e($tableName); ?>', {softDeletes: 'onlyTrashed'}); open = false"
                class="cursor-pointer flex justify-start block px-4 py-2 text-pg-primary-800 hover:bg-pg-primary-50 hover:text-black-200 dark:text-pg-primary-200 dark:hover:bg-gray-900 dark:hover:bg-pg-primary-700"
            >
                <?php echo app('translator')->get('livewire-powergrid::datatable.soft_deletes.only_trashed'); ?>
            </div>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\vendor\power-components\livewire-powergrid\resources\views\components\frameworks\tailwind\header\soft-deletes.blade.php ENDPATH**/ ?>