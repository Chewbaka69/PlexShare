<div class="settings-container">
    <div class="filter-bar">
        <button class="toggle-advanced-btn btn btn-sm Button-primary-2LQVw pull-left add"
                data-placement="top" data-toggle="tooltip" data-original-title="Add server"><i class="glyphicon circle-plus"></i></button>
        <?php if ($countServers > 0) : ?>
        <button class="toggle-advanced-btn btn btn-sm btn-default pull-right refresh"><?php echo __('refresh_servers'); ?> &nbsp;<i class="glyphicon refresh"></i></button>
        <?php endif; ?>
    </div>
    <div class="devices-container row">
        <div class="device-list-container col-sm-12 col-md-12">
            <ul class="list card-tile-list">
                <?php if($servers) : ?>
                <?php foreach ($servers as $server) : ?>
                <li class="card-tile-list-item card-2-col-item">
                    <div class="card card-device">
                        <img class="card-poster device-icon" src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMTEwIDExMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiNlNWEwMGQiIGQ9Im0wIDBoMTEwdjExMGgtMTEweiIvPjxwYXRoIGQ9Im0zMCA2MGMxNi41NjkgMCAzMC0xMy40MzEgMzAtMzAgMC0xNi41NjktMTMuNDMxLTMwLTMwLTMwLTE2LjU2OSAwLTMwIDEzLjQzMS0zMCAzMCAwIDE2LjU2OSAxMy40MzEgMzAgMzAgMzBtLS41NzEtNDguNzJsMTIuMTQ5IDE4Ljc0OS0xMi4xNSAxOC43NWgtNS41MDQtNS41MDR2LS4wMDRsMTIuMTQ3LTE4Ljc0Ni0xMi4xNDctMTguNzQ2di0uMDAyaDExLjAxIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgyNSAyNSkiIGZpbGw9IiMxZjFmMWYiLz48L2c+PC9zdmc+">
                        <div class="card-actions">
                            <button class="refresh-server-btn card-action-btn btn-info" data-server-id="<?php echo $server->id; ?>"
                                    data-placement="top" data-toggle="tooltip" data-original-title="<?php echo __('refresh'); ?>">
                                <i class="glyphicon refresh"></i>
                            </button>
                            <button class="edit-server-btn card-action-btn" data-server-id="<?php echo $server->id; ?>"
                                    data-placement="top" data-toggle="tooltip" data-original-title="<?php echo __('edit'); ?>">
                                <i class="glyphicon pencil"></i>
                            </button>
                            <button class="disable-server-btn card-action-btn btn-danger" data-server-id="<?php echo $server->id; ?>"
                                    data-placement="top" data-toggle="tooltip" data-original-title="<?php echo __('disable'); ?>">
                                <i class="glyphicon ban"></i>
                            </button>
                            <?php if($user->admin) : ?>
                            <button class="remove-server-btn card-action-btn btn-danger" data-server-id="<?php echo $server->id; ?>"
                                    data-placement="top" data-toggle="tooltip" data-original-title="<?php echo __('delete'); ?>">
                                <i class="glyphicon remove-2"></i>
                            </button>
                            <?php endif; ?>
                        </div>
                        <h4 class="name"><?php echo $server->name; ?> <span data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $server->online ? __('online') : __('offline') ; ?>" class="glyphicon <?php echo $server->online ? 'server text-success' : 'server-ban text-danger' ; ?>"></span></h4>
                        <div class="card-details">
                            <div class="pull-right">
                                <div class="last-seen text-muted" data-toggle="tooltip" data-original-title="<?php echo __('last_update'); ?>">
                                    <i class="plex-icon-watch-later-560"></i> <?php echo $server->getLastCheck(); ?>
                                </div>
                                <span class="sync-info hidden">
                                    <span class="glyphicon circle-arrow-down sync-icon"></span>
                                    <span class="sync-count">123</span> / <span class="sync-size">456</span>
                                </span>
                            </div>
                            <span class="version text-muted"><?php echo $server->version; ?></span>
                            <div class="device-info-container">
                                <div class="product">Plex Media Server</div>
                                <div class="device text-muted"></div>
                                <div class="platform-info text-muted">
                                    <span class="platform"><?php echo $server->plateforme; ?></span>
                                    <span class="platform-version"><?php echo $server->platformVersion; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(window).on('load', function() {
        $('.filter-bar .add').on('click', function () {
            $.ajax({
                method: 'get',
                url: '/rest/settings/modal_server.json'
            }).done(function (data) {
                $('body').append(data);
                setTimeout(function(){
                    $('.media-server-modal').removeClass('out').addClass('in');
                },100);
            });
        });
        $(document).on('click', '.media-server-modal button.close', function () {
            $('.media-server-modal').removeClass('in').addClass('out').delay(500).queue(function(){ $(this).remove()});
        });
        // ADD OR EDIT SERVER
        $(document).on('click', '#add-plex button', function () {
            var server_id = $('#add-plex #server_id').val();
            var https = $('#add-plex #https').is(':checked');
            var url = $('#add-plex #url').val();
            var port = $('#add-plex #port').val();
            var token = $('#add-plex #token').val();
            $.ajax({
                method: 'post',
                url: '/rest/settings/server.json',
                data: {server_id: server_id,https: https, url: url, port: port, token: token}
            }).done(function (data) {
                show_alert('success', 'Server save succesfully!');
                $('.media-server-modal button.close').click();
                setTimeout(function(){location.reload()}, 200);
            }).fail(function (data) {
                data = JSON.parse(data.responseText);
                show_alert('error', data.message);
            });
        });
        <?php if ($countServers > 0) : ?>
        // SERVER BUTTON ACTION
        $('button.refresh-server-btn').on('click', function () {
            var server_id = $(this).data('server-id');
            ajax += 1;
            checkAjax();
            $.ajax({
                method: 'get',
                url: '/rest/browse/server.json',
                data: {server_id: server_id}
            }).done(function (data) {
                updateServers(data);
                ajax -= 1;
                alert.toggleClass('transition-out');
                alert_status.html('Browse all your server is GOOD!');
            });
        });
        $('button.edit-server-btn').on('click', function () {
            var server_id = $(this).data('server-id');
            $.ajax({
                method: 'get',
                url: '/rest/settings/modal_server.json'
            }).done(function (modal) {
                $.ajax({
                    method: 'get',
                    url: '/rest/browse/server.json',
                    data: {server_id: server_id}
                }).done(function (server) {
                    $('body').append(modal);
                    setTimeout(function(){
                        $('#add-plex #server_id').val(server[0].id);
                        if(parseInt(server[0].https) === 1)
                            $('#add-plex #https').attr('checked', 'checked');
                        $('#add-plex #url').val(server[0].url);
                        $('#add-plex #port').val(server[0].port);
                        $('#add-plex #token').val(server[0].token);
                        $('.media-server-modal').removeClass('out').addClass('in');
                    },100);
                });
            });
        });
        $('button.disable-server-btn').on('click', function () {
            var button = this;
            var server_id = $(this).data('server-id');
            $.ajax({
                method: 'delete',
                url: '/rest/settings/server.json',
                data: {server_id: server_id}
            }).done(function (data) {
                show_alert('success', 'Server disable succesfully!');
                $(button).closest('li').get(0).remove();
            }).fail(function (data) {
                data = JSON.parse(data.responseText);
                show_alert('error', data.message);
            });
        });

        // REFRESH ALL SERVER
        $('.filter-bar .refresh').on('click', function () {
            ajax += 1;
            checkAjax();
            $.ajax({
                method: 'get',
                url: '/rest/browse/my_servers.json'
            }).done(function (data) {
                updateServers(data);
                ajax -= 1;
                alert.toggleClass('transition-out');
                alert_status.html('Browse all your server is GOOD!');
            });
        });
        <?php endif; ?>
    });
</script>