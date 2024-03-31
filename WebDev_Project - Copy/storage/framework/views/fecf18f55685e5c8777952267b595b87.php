<tr
    class="<?php echo e(data_get($theme, 'table.trBodyClass')); ?>"
    style="<?php echo e(data_get($theme, 'table.trBodyStyle')); ?>"
>
    <th
        class="<?php echo e(data_get($theme, 'table.tdBodyEmptyClass')); ?>"
        style="<?php echo e(data_get($theme, 'table.tdBodyEmptyStyle')); ?>"
        colspan="<?php echo e(($checkbox ? 1 : 0) + count($columns) + (data_get($setUp, 'detail.showCollapseIcon') ? 1 : 0)); ?>"
    >
        <span><?php echo e(trans('livewire-powergrid::datatable.labels.no_data')); ?></span>
    </th>
</tr>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\table\th-empty.blade.php ENDPATH**/ ?>