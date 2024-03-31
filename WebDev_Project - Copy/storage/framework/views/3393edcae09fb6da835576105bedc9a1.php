<?php
    $rulesValues = $actionRulesClass->recoverFromAction($row, 'pg:radio');

    $inputAttributes = new \Illuminate\View\ComponentAttributeBag([
        'class' => data_get($theme, 'radio.inputClass'),
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
        class="<?php echo e(data_get($theme, 'radio.tdClass')); ?>"
        style="<?php echo e(data_get($theme, 'radio.tdStyle')); ?>"
    >
    </td>
<?php elseif(filled($rulesValues['disable'])): ?>
    <td
        class="<?php echo e(data_get($theme, 'radio.tdClass')); ?>"
        style="<?php echo e(data_get($theme, 'radio.tdStyle')); ?>"
    >
        <div class="<?php echo e(data_get($theme, 'radio.divClass')); ?>">
            <label class="<?php echo e(data_get($theme, 'radio.labelClass')); ?>">
                <input
                    <?php echo e($inputAttributes); ?>

                    disabled
                    type="radio"
                >
            </label>
        </div>
    </td>
<?php else: ?>
    <td
        class="<?php echo e(data_get($theme, 'radio.thClass')); ?>"
        style="<?php echo e(data_get($theme, 'radio.thStyle')); ?>"
    >
        <div class="<?php echo e(data_get($theme, 'radio.divClass')); ?>">
            <label class="<?php echo e(data_get($theme, 'radio.labelClass')); ?>">
                <input
                    type="radio"
                    <?php echo e($inputAttributes); ?>

                    wire:model.live="selectedRow"
                    value="<?php echo e($attribute); ?>"
                >
            </label>
        </div>
    </td>
<?php endif; ?>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\radio-row.blade.php ENDPATH**/ ?>