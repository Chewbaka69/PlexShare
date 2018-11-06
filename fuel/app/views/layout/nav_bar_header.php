<div class="nav-bar">
    <ul class="nav nav-bar-nav">
        <!--li><a class="back-btn" href="#"><i class="glyphicon chevron-left"></i></a></li-->
        <li><a class="home-btn" href="/home"><i class="glyphicon home"></i></a></li>
    </ul>
    <div class="nav-bar-search-container">
        <div data-reactroot="" class="QuickSearch-container-2PWkB">
            <div class="QuickSearchInput-container-R2-wn "><i
                    class="plex-icon-search-560 QuickSearchInput-searchIcon-1f6m9" aria-hidden="true"></i><input
                    class="QuickSearchInput-searchInput-2HU6-" value="" autocomplete="off" spellcheck="false"
                    type="text"></div>
        </div>
    </div>
    <ul class="nav nav-bar-nav nav-bar-right">
        <li class="">
            <a class="activity-btn" href="#!/status" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Status">
                <span class="activity-badge badge badge-transparent hidden">0</span>
                <i class="glyphicon cardio"></i>
            </a>
        </li>
        <li>
            <a class="settings-btn dropdown-poster-container" href="/settings" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Settings">
                <i class="glyphicon settings"></i>
                <span class="total-badge badge" style="position: absolute;top: 34px;left: 5px">0</span>
            </a>
        </li>
        <li id="nav-dropdown" class="nav-dropdown dropdown">
            <a class="dropdown-toggle dropdown-poster-toggle" href="#nav-dropdown" data-toggle="dropdown">
                <div class="dropdown-poster-container">
                    <div class="media-poster img-circle loaded"
                         style="background-image: url(&quot;blob:https://app.plex.tv/3ebfa0a2-486e-45d0-8213-ec862f30e792&quot;);"></div>
                    <i class="caret-icon"></i>
                </div>
                <span class="total-badge badge">0</span>
            </a>
            <ul class="dropdown-menu signed-in full-user">
                <li class="signed-in-item dropdown-header username-header"><?php echo $user->username; ?></li>
                <li class="signed-in-item"><a href="#!/account">Account</a></li>
                <li class="divider"></li>
                <?php if($user->admin) : ?>
                    <li class="signed-in-item full-user-item"><a class="admin-user-btn" href="/admin">Admin <span class="badge">0</span></a></li>
                    <li class="signed-in-item"><a class="users-btn" href="/admin/users">Users <span class="media-count-badge badge">0</span></a></li>
                    <li class="divider"></li>
                    <li class="signed-in-item switch-user-item"><a class="switch-user-btn" href="#">Switch User...</a></li>
                <?php endif; ?>
                <li class="signed-in-item full-user-item"><a class="sign-out-btn" href="/logout">Sign Out</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="alert alert-status transition-out">
    <i class="alert-icon glyphicon cardio"></i>
    <span class="status"></span>
</div>
<div class="alert-bar-container"></div>