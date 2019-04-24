<!DOCTYPE html>
<html data-cast-api-enabled="true" lang="en">
<head>
    <title>PlexShare :: Settings</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <?php
    echo \Asset::css(['normalize.css', 'plex.css', 'settings.css']);
    echo \Asset::css(isset($css) ? $css : null);
    echo \Asset::js('jquery.min.js');
    ?>
    <link rel="shortcut icon" href="/favicon.ico">
</head>
<body>
<div id="plex" class="application">
    <?php echo \View::forge('layout/nav_bar_header', ['user' => $user]); ?>
    <div class="background-container">
        <div class="FullPage-container-17Y0c">
            <div>
                <div>
                    <div style="background-image: url('//assets.plex.tv/deploys/desktop/env-eb2798cc3c7d9533df5b563963d5c394/3.41.1-304f788/common/img/backgrounds/preset-dark.64cc1c942221cd2c153244bd8ecfb67a.png'); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                         class=""></div>
                </div>
                <div style="position: absolute; width: 100%; height: 100%; background: rgba(0, 0, 0, 0) url('//assets.plex.tv/deploys/desktop/env-eb2798cc3c7d9533df5b563963d5c394/3.41.1-304f788/common/img/backgrounds/noise.8b05ce45d0df59343e206bc9ae78d85d.png') repeat scroll 0% 0%; z-index: 2;"></div>
            </div></div>
    </div>
    <div id="content" class="scroll-container dark-scrollbar">
        <div class="container">
            <ul class="nav nav-header pull-right">
                <li class="web-nav-item"><a class="web-btn btn-gray" href="/settings"><?php echo __('general'); ?></a></li>
                <li class="server-nav-item "><a class="server-btn btn-gray" href="/settings/servers"><?php echo __('my_servers'); ?><span class="badge"><?php echo $countServers; ?></span></a></li>
                <li class="users-nav-item "><a class="users-btn btn-gray" href="/settings/libraries"><?php echo __('my_libraries'); ?><span class="badge"><?php echo $countLibraries; ?></span></a></li>
            </ul>
            <h2><?php echo __('settings'); ?></h2>
            <?php echo $body; ?>
        </div>
    </div>
    <div>
    </div>
</div>
<script>
    $(window).on('load', function() {
        $('[data-toggle="tooltip"]').tooltip({ container: 'body', template: '<div class="tooltip Tooltip-tooltipPortal-1IUlb"><div class="tooltip-arrow"></div><div class="tooltip-inner Tooltip-tooltip-2AL-W"></div></div>'});
    });
</script>
<?php
echo \Asset::js(['bootstrap.min.js']);
echo \Asset::js(isset($js_bottom) ? $js_bottom : null);
?>
</body>
</html>