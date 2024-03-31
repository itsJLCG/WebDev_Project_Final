<div class="p-2 bg-white border border-pg-primary-200">
    <div>Id <?php echo e($id); ?></div>
    <div>Options <?php echo json_encode($options, 15, 512) ?></div>
    <?php
        \Illuminate\Support\Facades\Log::info($id);
    ?>
</div>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views\vendor\livewire-powergrid\tests\detail.blade.php ENDPATH**/ ?>