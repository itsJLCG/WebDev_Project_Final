
<tr class="<?php echo e(data_get($theme, 'table.trBodyClass'). ' '.data_get($theme, 'table.trBodyClassTotalColumns')); ?>"
    style="<?php echo e(data_get($theme, 'table.trBodyStyle'). ' '.data_get($theme, 'table.trBodyStyleTotalColumns')); ?>">
    <?php if(data_get($setUp, 'detail.showCollapseIcon')): ?>
        <td class="<?php echo e(data_get($theme, 'table.tdBodyClass')); ?>" style="<?php echo e(data_get($theme, 'table.tdBodyStyle')); ?>"></td>
    <?php endif; ?>
    <?php if($checkbox): ?>
        <td class="<?php echo e(data_get($theme, 'table.tdBodyClass')); ?>" style="<?php echo e(data_get($theme, 'table.tdBodyStyle')); ?>"></td>
    <?php endif; ?>
    <?php $__currentLoopData = $this->visibleColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td class="<?php echo e(data_get($theme, 'table.tdBodyClassTotalColumns') . ' '.$column->bodyClass ?? ''); ?>"
            style="<?php echo e($column->hidden === true ? 'display:none': ''); ?>; <?php echo e(data_get($theme, 'table.tdBodyStyleTotalColumns') . ' '.$column->bodyStyle ?? ''); ?>">
            <?php echo $__env->make('livewire-powergrid::components.summarize', [
                'sum' => $column->sum['header'] ? data_get($column, 'summarize.sum') : null,
                'labelSum' => $column->sum['label'],

                'count' => $column->count['header'] ? data_get($column, 'summarize.count') : null,
                'labelCount' => $column->count['label'],

                'min' => $column->min['header'] ? data_get($column, 'summarize.min') : null,
                'labelMin' => $column->min['label'],

                'max' => $column->max['header'] ? data_get($column, 'summarize.max') : null,
                'labelMax' => $column->max['label'],

                'avg' => $column->avg['header'] ? data_get($column, 'summarize.avg') : null,
                'labelAvg' => $column->avg['label'],
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </td>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($actions) && count($actions)): ?>
        <th class="<?php echo e(data_get($theme, 'table.thClass') .' '. $column->headerClass); ?>" scope="col"
            style="<?php echo e(data_get($theme, 'table.thStyle')); ?>" colspan="<?php echo e(count($actions)); ?>">
        </th>
    <?php endif; ?>
</tr>

<?php /**PATH C:\xamppss\laravel\WebDev_Project\vendor\power-components\livewire-powergrid\resources\views\components\table-header.blade.php ENDPATH**/ ?>