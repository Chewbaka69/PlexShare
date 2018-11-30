<!DOCTYPE html>
<html data-cast-api-enabled="true" lang="en">
<?php echo \View::forge('layout/header', [
        'title' => isset($title) ? 'PlexShare :: ' . $title : 'PlexShare by Chewbaka'
]); ?>
<?php echo \View::forge('layout/body', [
        'servers'      => isset($servers) ? $servers : null,
        'body'      => isset($body) ? $body : null,
        'user'      => isset($user) ? $user : null,
        'MenuLibraries' => isset($MenuLibraries) ? $MenuLibraries : null,
        'MenuServer'    => isset($MenuServer) ? $MenuServer : null,
        'js_bottom' => isset($js_bottom) ? $js_bottom : null,
]); ?>
<!-- Created By Chewbaka69 // https://github.com/Chewbaka69/PlexShare -->
</html>