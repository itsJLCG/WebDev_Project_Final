<?php $actionRulesClass = app('PowerComponents\LivewirePowerGrid\Components\Rules\RulesController'); ?>

<tbody>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $rowId = data_get($row, $primaryKey);

            $class = data_get($theme, 'table.trBodyClass');

            $rulesValues = $actionRulesClass->recoverFromAction($row, 'pg:rows');

            $applyRulesLoop = true;

            $trAttributesBag = new \Illuminate\View\ComponentAttributeBag();
            $trAttributesBag = $trAttributesBag->merge(['class' => $class]);

            if (method_exists($this, 'actionRules')) {
                $applyRulesLoop = $actionRulesClass->loop($this->actionRules($row), $loop);
            }

            if (filled($rulesValues['setAttributes']) && $applyRulesLoop) {
                foreach ($rulesValues['setAttributes'] as $rulesAttributes) {
                    $trAttributesBag = $trAttributesBag->merge([
                        $rulesAttributes['attribute'] => $rulesAttributes['value'],
                    ]);
                }
            }
        ?>

        <?php if(isset($setUp['detail'])): ?>
            <tr <?php echo e($trAttributesBag); ?>>
                <?php echo $__env->make('livewire-powergrid::components.row', [
                    'rowIndex'   => $loop->index + 1,
                    'childIndex' => $childIndex
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </tr>
            <?php if(data_get($setUp, 'detail.state.' . $rowId)): ?>
                <tr
                    style="<?php echo e(data_get($theme, 'table.trBodyStyle')); ?>"
                    <?php echo e($trAttributesBag); ?>

                >
                    <?php echo $__env->make('livewire-powergrid::components.table.detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </tr>
            <?php endif; ?>
        <?php else: ?>
            <tr
                style="<?php echo e(data_get($theme, 'table.trBodyStyle')); ?>"
                <?php echo e($trAttributesBag); ?>

            >
                <?php echo $__env->make('livewire-powergrid::components.row', [
                    'rowIndex' => $loop->index + 1,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </tr>
        <?php endif; ?>

        <?php echo $__env->renderWhen(isset($setUp['responsive']), 'livewire-powergrid::components.expand-container', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\vendor\power-components\livewire-powergrid\resources\views\livewire\lazy-child.blade.php ENDPATH**/ ?>