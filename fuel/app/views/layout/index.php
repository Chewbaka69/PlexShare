<!DOCTYPE html>
<html data-cast-api-enabled="true" lang="en">
<?php echo \View::forge('layout/header'); ?>
<?php echo \View::forge('layout/body', [
    'body'      => isset($body) ? $body : null,
    'user'      => isset($user) ? $user : null,
    'libraries' => isset($libraries) ? $libraries : null,
    'server'    => isset($server) ? $server : null,
    'js_bottom' => isset($js_bottom) ? $js_bottom : null,
]); ?>
</html>