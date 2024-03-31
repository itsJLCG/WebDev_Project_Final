<?php if(data_get($setUp, 'detail.state.' . $rowId)): ?>
    <?php
        $rulesValues = $actionRulesClass->recoverFromAction($row, 'pg:rows');
    ?>

    <td colspan="999">
        <?php if(filled($rulesValues['detailView'])): ?>
            <?php echo $__env->renderWhen(data_get($setUp, 'detail.state.' . $row->{$primaryKey}),
                $rulesValues['detailView'][0]['detailView'],
                [
                    'id' => data_get($row, $primaryKey),
                    'options' => array_merge(
                        data_get($setUp, 'detail.options'),
                        $rulesValues['detailView']['0']['options']),
                ]
            , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        <?php else: ?>
            <?php echo $__env->renderWhen(data_get($setUp, 'detail.state.' . $row->{$primaryKey}),
                data_get($setUp, 'detail.view'),
                [
                    'id' => data_get($row, $primaryKey),
                    'options' => data_get($setUp, 'detail.options'),
                ]
            , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        <?php endif; ?>
    </td>
<?php endif; ?>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\table\detail.blade.php ENDPATH**/ ?>