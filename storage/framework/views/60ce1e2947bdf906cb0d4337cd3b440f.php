<aside class="vh-100 bg-light border-end" style="width: 240px;">
  <!-- Tam yüksekliğe sahip, sol kenarda sabit duran açık renkli yan çubuk (240px genişlik) -->
  <ul class="nav flex-column py-4 px-2 fw-semibold">
    <!-- Dikey yönde sıralanan, içten boşluklu ve kalın yazı stilli navigasyon menüsü -->

    
    <li class="nav-item mb-2">
      <a class="nav-link d-flex align-items-center <?php echo e(request()->routeIs('calendar.*') ? 'active text-primary' : 'text-dark'); ?>"
         href="<?php echo e(route('calendar.index')); ?>">
        📅 <span class="ms-2"><?php echo e(__('calendar.title')); ?></span>
      </a>
    </li>

    
    
    <li class="nav-item mb-2">
      <a class="nav-link d-flex align-items-center <?php echo e(request()->routeIs('content.*') ? 'active text-primary' : 'text-dark'); ?>"
         href="<?php echo e(route('content.index')); ?>">
        📝 <span class="ms-2">Blog</span>
      </a>
    </li>

       
    <li class="nav-item mb-2">
      <a class="nav-link d-flex align-items-center <?php echo e(request()->routeIs('settings.*') ? 'active text-primary' : 'text-dark'); ?>"
         href="<?php echo e(route('settings.show')); ?>">
        ⚙️ <span class="ms-2"><?php echo e(__('Ayarlar')); ?></span>
      </a>
    </li>

    
    <li class="nav-item mt-auto">
      <form method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
        <button class="btn btn-link nav-link d-flex align-items-center text-danger">
          🚪 <span class="ms-2"><?php echo e(__('auth.logout')); ?></span>
        </button>
      </form>
    </li>
  </ul>
</aside><?php /**PATH C:\laragon\www\laravel-content-calendar\resources\views/layouts/sidebar-staff.blade.php ENDPATH**/ ?>