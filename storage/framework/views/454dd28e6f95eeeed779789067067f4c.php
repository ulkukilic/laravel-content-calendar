


<?php $__env->startSection('title', 'Personel Paneli'); ?>
<?php $__env->startSection('page_title', 'Hoşgeldin, ' . session('name') . '!'); ?>

<?php $__env->startSection('content'); ?>
  <div class="alert alert-info">
    Personel paneline hoşgeldiniz!  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel-content-calendar\resources\views/dash/staff.blade.php ENDPATH**/ ?>