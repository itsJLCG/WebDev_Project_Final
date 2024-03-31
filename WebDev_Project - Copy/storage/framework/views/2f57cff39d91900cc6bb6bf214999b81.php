<?php
    $rulesValues = $actionRulesClass->recoverFromAction($row, 'pg:checkbox');

    $inputAttributes = new \Illuminate\View\ComponentAttributeBag([
        'class' => data_get($theme, 'checkbox.inputClass'),
    ]);

    if (filled($rulesValues['setAttributes'])) {
        foreach ($rulesValues['setAttributes'] as $rulesAttributes) {
            $inputAttributes = $inputAttributes->merge([
                $rulesAttributes['attribute'] => $rulesAttributes['value'],
            ]);
        }
    }
?>

<?php if(filled($rulesValues['hide'])): ?>
    <td
        class="<?php echo e(data_get($theme, 'checkbox.thClass')); ?>"
        style="<?php echo e(data_get($theme, 'checkbox.thStyle')); ?>"
    >
    </td>
<?php elseif(filled($rulesValues['disable'])): ?>
    <td
        class="<?php echo e(data_get($theme, 'checkbox.tdClass')); ?>"
        style="<?php echo e(data_get($theme, 'checkbox.tdStyle')); ?>"
    >
        <div class="<?php echo e(data_get($theme, 'checkbox.divClass')); ?>">
            <label class="<?php echo e(data_get($theme, 'checkbox.labelClass')); ?>">
                <input
                    <?php echo e($inputAttributes); ?>

                    disabled
                    type="checkbox"
                >
            </label>
        </div>
    </td>
<?php else: ?>
    <td
        class="<?php echo e(data_get($theme, 'checkbox.thClass')); ?>"
        style="<?php echo e(data_get($theme, 'checkbox.thStyle')); ?>"
    >
        <div class="<?php echo e(data_get($theme, 'checkbox.divClass')); ?>">
            <label class="<?php echo e(data_get($theme, 'checkbox.labelClass')); ?>">
                <input
                    x-data="{}"
                    type="checkbox"
                    <?php echo e($inputAttributes); ?>

                    x-on:click="window.Alpine.store('pgBulkActions').add($event.target.value, '<?php echo e($tableName); ?>')"
                    wire:model="checkboxValues"
                    value="<?php echo e($attribute); ?>"
                >
            </label>
        </div>
    </td>
<?php endif; ?>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\checkbox-row.blade.php ENDPATH**/ ?>