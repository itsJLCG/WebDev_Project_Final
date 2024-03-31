<?php
    $params = [
        'id' => data_get($row, $primaryKey),
        'isHidden' => !$showToggleable ? 'true' : 'false',
        'tableName' => $tableName,
        'field' => $column->field,
        'toggle' => (int) $row->{$column->field},
        'trueValue' => $column->toggleable['default'][0],
        'falseValue' => $column->toggleable['default'][1],
    ];
?>

<div x-data="pgToggleable(<?php echo \Illuminate\Support\Js::from($params)->toHtml() ?>)">
    <?php if($column->toggleable['enabled'] && $showToggleable === true): ?>
        <div class="form-check form-switch">
            <label>
                <input
                    x-on:click="save()"
                    class="form-check-input"
                    :checked="toggle === 1"
                    type="checkbox"
                >
            </label>
        </div>
    <?php else: ?>
        <div class="text-center">
            <?php if($row->{$column->field} == 0): ?>
                <div
                    x-text="falseValue"
                    style="padding-top: 0.1em; padding-bottom: 0.1rem"
                    class="badge bg-danger"
                >
                </div>
            <?php else: ?>
                <div
                    x-text="trueValue"
                    style="padding-top: 0.1em; padding-bottom: 0.1rem"
                    class="badge bg-success"
                >
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\frameworks\bootstrap5\toggleable.blade.php ENDPATH**/ ?>