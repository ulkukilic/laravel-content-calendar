<?php if(session('success')): ?>
  <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<?php if(session('error')): ?>
  <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
<?php endif; ?>

<?php if($errors->any()): ?>
  <div class="alert alert-danger">
    <ul class="mb-0">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($err); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?><?php /**PATH C:\laragon\www\laravel-content-calendar\resources\views/layouts/alerts.blade.php ENDPATH**/ ?>