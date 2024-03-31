<?php $__env->startSection('content'); ?>
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content d-flex justify-content-center align-items-center">
    <div class="card" style="width: 1000px;">
      <div class="card-header">
        <h5 class="title text-center">We'd Love Your Feedback</h5>
      </div>
      <div class="card-body" style="font-size: 25px;">
        <form action="<?php echo e(route('feed.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <div class="form-group text">
            <label for="satisfaction">Overall Satisfaction:</label>
            <div class="satisfaction-ratings">
                <input type="radio" name="satisfaction" id="satisfaction1" value="Very Dissatisfied">
                <label for="satisfaction1">&#128577;</label> <!-- Very Dissatisfied -->
                <input type="radio" name="satisfaction" id="satisfaction2" value="Dissatisfied">
                <label for="satisfaction2">&#128533;</label> <!-- Dissatisfied -->
                <input type="radio" name="satisfaction" id="satisfaction3" value="Neutral">
                <label for="satisfaction3">&#128528;</label> <!-- Neutral -->
                <input type="radio" name="satisfaction" id="satisfaction4" value="Satisfied">
                <label for="satisfaction4">&#128578;</label> <!-- Satisfied -->
                <input type="radio" name="satisfaction" id="satisfaction5" value="Very Satisfied">
                <label for="satisfaction5">&#128513;</label> <!-- Very Satisfied -->
            </div>
        </div>

          <div class="form-group">
            <label for="Recommendation">How likely are you to recommend this to others? (0-10):</label>
            <select name="Recommendation" id="Recommendation" class="form-control">
                <?php for($i = 0; $i <= 10; $i++): ?>
                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="Opinion">Your opinion about the website:</label>
            <textarea name="Opinion" id="Opinion" class="form-control" rows="4"></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Submit Feedback</button>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Feedback',
    'class' => 'sidebar-mini',
    'activePage' => 'feedback',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppss\laravel\ParishConnectSoaperFinal-master\resources\views/pages/feedback.blade.php ENDPATH**/ ?>