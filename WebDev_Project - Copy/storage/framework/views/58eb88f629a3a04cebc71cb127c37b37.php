<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'primaryKey' => null,
    'row' => null,
    'field' => null,
    'theme' => null,
    'currentTable' => null,
    'tableName' => null,
    'showErrorBag' => null,
    'editable' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'primaryKey' => null,
    'row' => null,
    'field' => null,
    'theme' => null,
    'currentTable' => null,
    'tableName' => null,
    'showErrorBag' => null,
    'editable' => null,
]); ?>
<?php foreach (array_filter(([
    'primaryKey' => null,
    'row' => null,
    'field' => null,
    'theme' => null,
    'currentTable' => null,
    'tableName' => null,
    'showErrorBag' => null,
    'editable' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $resolveContent = function (string $currentTable, string $field, \Illuminate\Database\Eloquent\Model|\stdClass $row): ?string {
        $currentField = $field;
        $replace = fn($content) => preg_replace('#<script(.*?)>(.*?)</script>#is', '', $content);

        /** @codeCoverageIgnore */
        if (str_contains($currentField, '.')) {
            $data = \Illuminate\Support\Str::of($field)->explode('.');
            $table = $data->get(0);
            $field = $data->get(1);

            if ($table === $currentTable) {
                return $replace($row->{$field});
            }

            return $replace($row->{$table}->{$field});
        }

        return $replace($row->{$field});
    };

    $fallback = html_entity_decode(strval(data_get($editable, 'fallback')), ENT_QUOTES, 'utf-8');
    $value = html_entity_decode(strval($resolveContent($currentTable, $field, $row)), ENT_QUOTES, 'utf-8');

    $content = !empty($value) || $value == '0' ? $value : $fallback;

    $params = [
        'theme' => data_get($theme, 'name'),
        'tableName' => $tableName,
        'id' => data_get($row, $primaryKey),
        'dataField' => $field,
        'content' => $content,
        'fallback' => $fallback,
        'inputClass' => data_get($theme, 'editable.inputClass'),
        'saveOnMouseOut' => data_get($editable, 'saveOnMouseOut'),
    ];
?>
<div
    wire:key="editable-<?php echo e(uniqid()); ?>"
    x-cloak
    x-data="pgEditable(<?php echo \Illuminate\Support\Js::from($params)->toHtml() ?>)"
    style="width: 100% !important; height: 100% !important;"
>
    <div
        :class="{
            'py-2': theme == 'tailwind',
            'p-1': theme == 'bootstrap5',
        }"
        x-show="!showEditable"
        x-on:click="editable = true;"
        :id="`clickable-` + dataField + '-' + id"
        style="cursor: pointer; width: 100%; height: 100%;"
    >
        <span
            style="border-bottom: dotted 1px;"
            x-text="content"
        ></span>
    </div>
    <template
        x-if="showEditable && !hashError"
        style="margin-bottom: 4px"
    >
        <div x-html="editableInput"></div>
    </template>
    <?php if($showErrorBag): ?>
        <?php $__errorArgs = [$field . '.' . $row->{$primaryKey}];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-sm text-red-800 p-1 transition-all duration-200">
                <?php echo e(str($message)->replace($field . '.' . $row->{$primaryKey}, $field)); ?>

            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\editable.blade.php ENDPATH**/ ?>