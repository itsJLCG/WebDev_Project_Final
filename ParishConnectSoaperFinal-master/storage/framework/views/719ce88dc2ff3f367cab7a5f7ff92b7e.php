<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <div class="navbar-toggle">
        <button type="button" class="navbar-toggler">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
    <a class="navbar-brand" href="#pablo"><?php echo e($namePage); ?></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="now-ui-icons users_single-02"></i>
            <p>
              <span class="d-lg-none d-md-block"><?php echo e(__("Account")); ?></span>
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>"><?php echo e(__("My Profile / Edit profile")); ?></a>
            <a class="dropdown-item" href="<?php echo e(route('applications')); ?>"><?php echo e(__("Approved/Pending Application")); ?></a>
            <a class="dropdown-item" href="<?php echo e(route('events')); ?>"><?php echo e(__("Approved/Pending Scheduling")); ?></a>
            <?php if(auth()->check() && auth()->user()->is_admin == 1): ?>
                <a class="dropdown-item" href="<?php echo e(url('/admin')); ?>"><?php echo e(__("Admin Page")); ?></a>
            <?php endif; ?>
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              <?php echo e(__('Logout')); ?>

            </a>

          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php /**PATH C:\xamppss\laravel\ParishConnectSoaperFinal-master\resources\views/layouts/navbars/navs/auth.blade.php ENDPATH**/ ?>