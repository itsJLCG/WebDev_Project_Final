<div class="sidebar" data-color="orange">
    <div class="logo">
        <a class="simple-text logo-mini">
            <img src="<?php echo e(asset('assets/img/ParishConnectLogo.png')); ?>" alt="Logo" style="max-width: 45px; height: 30px;">
        </a>
        <a class="simple-text logo-normal" style="font-size: 18px;">
            <?php echo e(__('ParishConnect')); ?>

        </a>
    </div>

    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="<?php if($activePage == 'home'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('home')); ?>">
                    <p style="font-size: 16px;"><?php echo e(__('Home')); ?></p>
                </a>
            </li>
            <li class="<?php if($activePage == 'liturgicalActivitiesScheduling'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('liturgicalActivitiesScheduling')); ?>">
                    <p style="font-size: 16px; white-space: normal;"><?php echo e(__('Liturgical Activities Scheduling')); ?></p>
                </a>
            </li>
            <li class="<?php if($activePage == 'massSchedule'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('massSchedule')); ?>">
                    <p style="font-size: 16px;"><?php echo e(__('Livestreaming')); ?></p>
                </a>
            </li>
            <li class="<?php if($activePage == 'application'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('application')); ?>">
                    <p style="font-size: 16px;"><?php echo e(__('Ministry Application')); ?></p>
                </a>
            </li>
            <li class="<?php if($activePage == 'resources'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('resources')); ?>">
                    <p style="font-size: 16px;"><?php echo e(__('Resources')); ?></p>
                </a>
            </li>
            <li class="nav-item <?php if(in_array($activePage, ['financialreport', 'financialreport2'])): ?> active <?php endif; ?>">
                <a data-toggle="collapse" href="#financialReportsSubMenu" class="collapsed" aria-expanded="false">
                    <p style="font-size: 16px;"><?php echo e(__('Financial Reports')); ?></p>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="financialReportsSubMenu">
                    <ul class="nav">
                        <li class="<?php if($activePage == 'financialreport'): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route('financialreport')); ?>">
                                <p style="padding-left: 20px; font-size: 16px; white-space: normal;"><?php echo e(__('Financial Report For Money')); ?></p>
                            </a>
                        </li>
                        <li class="<?php if($activePage == 'financialreport2'): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route('financialreport2')); ?>">
                                <p style="padding-left: 20px; font-size: 16px; white-space: normal;"><?php echo e(__('Financial Report For In Kind')); ?></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="<?php if($activePage == 'donation'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('donation')); ?>">
                    <p style="font-size: 16px;"><?php echo e(__('Offerings')); ?></p>
                </a>
            </li>
            <li class="<?php if($activePage == 'forum'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('forum')); ?>">
                    <p style="font-size: 16px;"><?php echo e(__('Forum')); ?></p>
                </a>
            </li>
            <li class="<?php if($activePage == 'feedback'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('feedback')); ?>">
                    <p style="font-size: 16px;"><?php echo e(__('Feedback')); ?></p>
                </a>
            </li>
            <li class="<?php if($activePage == 'profile'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('profile.edit')); ?>">
                    <p style="font-size: 16px;"> <?php echo e(__("User Profile")); ?> </p>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH C:\xamppss\laravel\ParishConnect_FinalSystem\resources\views/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>