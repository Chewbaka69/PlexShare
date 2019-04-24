<div class="nav-bar">
    <ul class="nav nav-bar-nav">
        <!--li><a class="back-btn" href="#"><i class="glyphicon chevron-left"></i></a></li-->
        <li><a class="home-btn" href="/home"><i class="glyphicon home"></i></a></li>
    </ul>
    <div class="nav-bar-search-container">
        <div data-reactroot="" class="QuickSearch-container-2PWkB">
            <div class="QuickSearchInput-container-R2-wn ">
                <i class="plex-icon-search-560 QuickSearchInput-searchIcon-1f6m9" aria-hidden="true"></i>
                <input class="QuickSearchInput-searchInput-2HU6-" value="" autocomplete="off" spellcheck="false"
                       type="text">
            </div>
            <?php echo \View::forge('layout/search')->render(); ?>
        </div>
    </div>
    <ul class="nav nav-bar-nav nav-bar-right">
        <li class="">
            <a class="activity-btn" href="#" data-toggle="tooltip" data-placement="bottom"
               title="<?php echo ucfirst(__('status')); ?>">
                <span class="activity-badge badge badge-transparent hidden">0</span>
                <i class="glyphicon cardio"></i>
            </a>
        </li>
        <li>
            <a class="settings-btn dropdown-poster-container" href="/settings" data-toggle="tooltip"
               data-placement="bottom" title="<?php echo __('settings'); ?>">
                <i class="glyphicon settings"></i>
                <span class="total-badge badge" style="position: absolute;top: 34px;left: 5px">0</span>
            </a>
        </li>
        <li id="nav-dropdown" class="nav-dropdown dropdown">
            <a class="dropdown-toggle dropdown-poster-toggle" href="#nav-dropdown" data-toggle="dropdown">
                <div class="dropdown-poster-container">
                    <div class="media-poster img-circle loaded"></div>
                    <i class="caret-icon"></i>
                </div>
                <span class="total-badge badge">0</span>
            </a>
            <ul class="dropdown-menu signed-in full-user">
                <li class="signed-in-item dropdown-header username-header"><?php echo $user->username; ?></li>
                <li class="signed-in-item"><a href="#"><?php echo ucfirst(__('account')); ?></a></li>
                <li class="divider"></li>
                <?php if ($user->admin) : ?>
                    <li class="signed-in-item full-user-item">
                        <a class="admin-user-btn" href="/admin"><?php echo ucfirst(__('admin')); ?>
                            <span class="badge">0</span>
                        </a>
                    </li>
                    <li class="signed-in-item">
                        <a class="users-btn" href="/admin/users"><?php echo ucfirst(__('users')); ?>
                            <span class="media-count-badge badge">0</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="signed-in-item switch-user-item">
                        <a class="switch-user-btn" href="#"><?php echo ucfirst(__('switch_user')); ?>...</a>
                    </li>
                <?php endif; ?>
                <li class="signed-in-item full-user-item"><a class="sign-out-btn" href="/logout"><?php echo ucfirst(__('sign_out')); ?></a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="alert alert-status transition-out">
    <i class="alert-icon glyphicon cardio"></i>
    <span class="status"></span>
</div>
<div class="alert-bar-container"></div>