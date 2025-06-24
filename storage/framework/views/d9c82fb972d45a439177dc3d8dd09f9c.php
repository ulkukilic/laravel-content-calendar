
 
<?php $__env->startSection('title','Login'); ?>
<?php $__env->startSection('content'); ?>

  <div class="container-fluid login-page"> <!-- ekranın solundan sağına kadar yayılır ve kenar boşlukları korur-->
    <div class="d-flex full-height p-v-20 flex-column justify-content-between"> <!--tam yükseklik alır, dikeyde 20px boşluk, içerikleri üst ve alt köşelere yerleştirir  -->
         
        <div class="d-none d-md-flex p-h-40"><!-- -->
        <img src="<?php echo e(asset('panel/assets/images/logo.jpg')); ?>" alt="logo">
       </div>
         
        <div class="col-md-5"> <!--ekran genişliklerinde 12 sütunluk sistemin 5 sütununu kaplayarak form kartını sayfa düzenine göre konumlandırır-->
        <div class="card"> <!--Kart bileşeni: form alanını-->
        <div class="card-body"><!-- içinde yer alan form elemanlarına etrafında 1rem’lik varsayılan padding -->
              
              <!-- Heading and subheading -->
                <h2 class="m-t-20"><?php echo e(__('auth.login.title')); ?></h2>
                <p class="m-b-30"><?php echo e(__('Enter your credentials to get access')); ?></p>
                <?php echo $__env->make('layouts.alerts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <form method="POST" action="<?php echo e(route('login.submit')); ?>">
                 <?php echo csrf_field(); ?> <!-- CSRF protection -->

                 <!-- Email input -->
                 <div class="form-group"><!--  gruplandirma icin-->
                    <label class='font-weight-semibold'  for='email'><?php echo e(__('auth.login.email')); ?>:</label>
                    <div class="input-affix"><!-- Input’un başına veya sonuna ikon eklemek için -->
                    <i class="prefix-icon anticon anticon-mail"></i> 
                     <input type="email"
                         name="email"
                         id="email"
                         value="<?php echo e(old('email')); ?>"
                         class="form-control"
                         placeholder="<?php echo e(__('auth.login.email')); ?>"
                         required> <!-- value="<?php echo e(old('email')); ?>" = Hata sonrası form yeniden yüklendiğinde önceki girilen değeri korur  -->
                    </div>
                 </div>

                 <!-- Password input -->
                  <div class="form-group">
                    <label class="font-weight-semibold" for="password"><?php echo e(__('auth.login.password')); ?>:</label>
                    <div class="input-affix m-b-10">
                    <i class="prefix-icon anticon anticon-lock"></i>
                    <input type="password"
                         name="password"
                         id="password"
                          class="form-control"
                         placeholder="<?php echo e(__('auth.login.password')); ?>"
                         required>
                    </div>
                       </div>
                <!-- Signup link & submit button -->
                  <div class="form-group">
                    <div class="d-flex align-items-center justify-content-between">
                    <span class="font-size-13 text-muted"><?php echo e(__('auth.login.no_account')); ?>

                    <a class="small" href="<?php echo e(route('register')); ?>"><?php echo e(__('auth.login.register')); ?></a></span>
                    <button class="btn btn-primary"><?php echo e(__('auth.login.submit')); ?></button>
                    </div>
                      </div>
                 </form>
        </div>
        </div>
        </div>

       <!-- SAG RESIM -->
        <div class="offset-md-1 col-md-6 d-none d-md-block">
          <img class="img-fluid"  src="<?php echo e(asset('panel/assets/images/logo.jpg')); ?>" alt="logo">
         </div>
      
 </div>
        </div>
         <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\laravel-content-calendar\resources\views/auth/login.blade.php ENDPATH**/ ?>