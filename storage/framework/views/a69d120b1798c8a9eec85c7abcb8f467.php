
<?php $__env->startSection('title', __('Ayarlar')); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
  <h2 class="mb-4"><?php echo e(__('Ayarlar')); ?></h2>
  <?php echo $__env->make('layouts.alerts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <form method="POST" action="<?php echo e(route('settings.update')); ?>">
  <?php echo csrf_field(); ?>
     <!-- Dil seçimi için açılır menü -->
    <div class="mb-3">
      <label for="locale" class="form-label"><?php echo e(__('Dil')); ?></label>
       <!-- Dil seçeneklerini gösteren select -->
      <select name="locale" id="locale" class="form-select">
        <option value="tr" <?php echo e($currentLocale==='tr'?'selected':''); ?>>Türkçe</option>
        <option value="en" <?php echo e($currentLocale==='en'?'selected':''); ?>>English</option>
      </select>
    </div>
    <!-- Tema seçimi için açılır menü -->
    <div class="mb-3">
      <label for="theme" class="form-label"><?php echo e(__('Tema')); ?></label>
      <select name="theme" id="theme" class="form-select">
        <option value="light" <?php echo e($currentTheme==='light'?'selected':''); ?>><?php echo e(__('Açık')); ?></option>
        <option value="dark"  <?php echo e($currentTheme==='dark'?'selected':''); ?>><?php echo e(__('Koyu')); ?></option>
      </select>
    </div>
   <!-- Formu gondereke ayarlari kontrol eder -->
    <button class="btn btn-primary"><?php echo e(__('Kaydet')); ?></button>
  </form>
</div>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel-content-calendar\resources\views/settings/show.blade.php ENDPATH**/ ?>