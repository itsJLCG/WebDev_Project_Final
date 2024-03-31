<tbody
    x-cloak
    expand
    wire:key="<?php echo e(md5('expand-' . $rowId)); ?>"
    x-show="hasHiddenElements"
>
    <tr
        x-show="expanded == '<?php echo e($rowId); ?>'"
        x-transition
        class="text-pg-primary-500 border-pg-primary-100 dark:text-pg-primary-200 break-words w-full text-sm"
    >
        <td colspan="999">
            <div class="flex gap-x-6 gap-y-2 flex-wrap p-2 responsive-row-expand-container"></div>
        </td>
    </tr>
</tbody>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\components\expand-container.blade.php ENDPATH**/ ?>