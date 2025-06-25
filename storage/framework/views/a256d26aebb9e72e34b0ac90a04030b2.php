

<?php $__env->startSection('page_title', __('calendar.title')); ?>
<?php $__env->startSection('content'); ?>
  <h2 class="mb-4"><?php echo e(__('calendar.title')); ?></h2>
  <!-- takvim içeriği -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel-content-calendar\resources\views/calendar/index.blade.php ENDPATH**/ ?>