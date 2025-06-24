<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?php $theme = session('theme','light'); ?>
 <?php if($theme==='dark'): ?>
   <link href="<?php echo e(asset('panel/assets/css/app-dark.css')); ?>" rel="stylesheet">
 <?php else: ?>
   <link href="<?php echo e(asset('panel/assets/css/app-light.css')); ?>" rel="stylesheet">
 <?php endif; ?>
  <title><?php echo $__env->yieldContent('title'); ?></title>
 </head>
<body>
  <div class="page-layout">
    <aside class="sidebar">
       <?php if(session('role') === 'admin'): ?>
        <?php echo $__env->make('layouts.sidebar-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
       <?php elseif(session('role') === 'staff'): ?>
        <?php echo $__env->make('layouts.sidebar-staff', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      <?php endif; ?> 
    </aside>
      <div class="container-inner"> <!--İçeriği merkezde tutan iç konteyner -->
      <main class="content-wrapper"><!-- Sayfa içeriğinin ana sarmalayıcısı-->
         <h1 class="page-title"><?php echo $__env->yieldContent('page_title'); ?></h1>
        <?php echo $__env->make('layouts.alerts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
      </main>
    </div>
  </div>
   <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
  </body>
</html><?php /**PATH C:\laragon\www\laravel-content-calendar\resources\views/layouts/app.blade.php ENDPATH**/ ?>