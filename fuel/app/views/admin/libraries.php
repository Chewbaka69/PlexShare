<div class="settings-container">
    <div class="filter-bar">
        <div class="filter-bar-right">
            <button class="toggle-advanced-btn btn btn-sm btn-default refresh">Refresh Libraries &nbsp;<i class="glyphicon refresh"></i></button>
        </div>
        <span id="primary-server-dropdown" class="dropdown">
            <a class="dropdown-toggle" href="#primary-server-dropdown" data-toggle="dropdown">
                <span class="dropdown-friendly-name">HF-Server</span> <i class="caret-icon"></i>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a data-id="df1de861fbaba243c18ed9275fd42e3248d19336" href="#">
                        <span class="dropdown-truncated-label">Chewbaka</span>
                    </a>
                </li>
                <li>
                    <a data-id="11f086036e179128e7b077495e238d1c922d605c" href="#">
                        <span class="dropdown-truncated-label">HF-Server</span>
                        <i class="dropdown-selected-icon glyphicon ok-2"></i>
                    </a>
                </li>
            </ul>
        </span>
    </div>
    <div class="devices-container row">
        <div class="device-list-container col-sm-12 col-md-12">
            <ul class="list card-tile-list">
                <?php if($libraries) : ?>
                <?php foreach ($libraries as $library) : ?>
                <li class="card-tile-list-item card-3-col-item">
                    <div class="card card-device <?php echo $library->disable ? 'disabled' : ''; ?>">
                        <div class="card-actions">
                            <a href="/settings/libraries/premissions/<?php echo $library->id; ?>">
                                <button class="permissions-library-btn card-action-btn" data-library-id="<?php echo $library->id; ?>"
                                        data-toggle="tooltip" data-original-title="Permissions">
                                    <i class="glyphicon unlock"></i>
                                </button>
                            </a>
                            <button class="refresh-library-btn card-action-btn btn-info" data-library-id="<?php echo $library->id; ?>"
                                    data-toggle="tooltip" data-original-title="Refresh">
                                <i class="glyphicon refresh"></i>
                            </button>
                            <?php if($library->disable) : ?>
                            <button class="enable-library-btn card-action-btn btn-success" data-library-id="<?php echo $library->id; ?>"
                                    data-toggle="tooltip" data-original-title="Enable">
                                <i class="glyphicon ok-2"></i>
                            </button>
                            <?php else: ?>
                            <button class="disable-library-btn card-action-btn btn-danger" data-library-id="<?php echo $library->id; ?>"
                                    data-toggle="tooltip" data-original-title="Disable">
                                <i class="glyphicon ban"></i>
                            </button>
                            <?php endif; ?>
                            <button class="remove-library-btn card-action-btn btn-danger" data-library-id="<?php echo $library->id; ?>"
                                    data-toggle="tooltip" data-original-title="Delete">
                                <i class="glyphicon remove-2"></i>
                            </button>
                        </div>
                        <h4 class="name">
                            <?php echo $library->name; ?>
                            <span class="glyphicon <?php echo $library->disable ? 'ban text-danger' : 'ok-2 text-success'; ?>" data-toggle="tooltip" data-original-title="<?php echo $library->disable ? 'Disabled' : 'Enabled'; ?>"></span>
                        </h4>
                        <div class="card-details">
                            <div class="pull-right">
                                <div class="last-seen text-muted"><i class="plex-icon-watch-later-560"></i> <?php echo $library->getLastUpdate(); ?></div>
                                <span class="sync-info hidden">
                            <span class="glyphicon circle-arrow-down sync-icon"></span>
                            <span class="sync-count">123</span> / <span class="sync-size">456</span>
                        </span>
                            </div>
                            <span class="version text-muted"><?php echo $library->type; ?></span>
                            <div class="device-info-container">
                                <div class="product"><?php echo $library->getServer()->name; ?></div>
                                <div class="device text-muted"></div>
                                <div class="platform-info text-muted">
                                    <span class="platform">Linux</span>
                                    <span class="platform-version">Debian 8</span>
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
    $(function() {
        $('.filter-bar .add').on('click', function () {
            $.ajax({
                method: 'get',
                url: '/rest/settings/add_server.json'
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
        $(document).on('click', '#add-plex button', function () {
            var url = $('#add-plex #url').val();
            var port = $('#add-plex #port').val();
            var token = $('#add-plex #token').val();
            $.ajax({
                method: 'post',
                url: '/rest/settings/server.json',
                data: {url: url, port: port, token: token}
            }).done(function (data) {
                show_alert('success', 'Server save succesfully!');
                $('.media-server-modal button.close').click();
            }).fail(function (data) {
                data = JSON.parse(data.responseText);
                show_alert('error', data.message);
                setTimeout(function(){location.reload()}, 200);
            });
        });
        // LIBRARY BUTTON ACTION
        $('button.refresh-library-btn').on('click', function () {
            var library_id = $(this).data('library-id');
            ajax += 1;
            checkAjax();
            $.ajax({
                method: 'get',
                url: '/rest/browse/library.json',
                data: {library_id: library_id}
            }).done(function (library) {
                var server = {};
                server.id = library.server_id;
                server.name = library.server_name;
                updateLibrary(server, library);
                ajax -= 1;
                alert.toggleClass('transition-out');
                alert_status.html('Start browsing your library');
            });
        });
        $(document).on('click', 'button.disable-library-btn', function () {
            var button = this;
            var library_id = $(this).data('library-id');
            $.ajax({
                method: 'delete',
                url: '/rest/settings/library.json',
                data: {library_id: library_id}
            }).done(function (data) {
                show_alert('success', 'Library disable succesfully!');
                $(button).removeClass('disable-library-btn btn-danger').addClass('enable-library-btn btn-success');
                $(button).find('i').removeClass('ban').addClass('ok-2');
                $(button).closest('.card.card-device').addClass('disabled');
            }).fail(function (data) {
                data = JSON.parse(data.responseText);
                show_alert('error', data.message);
            });
        });
        $(document).on('click', 'button.enable-library-btn', function () {
            var button = this;
            var library_id = $(this).data('library-id');
            $.ajax({
                method: 'put',
                url: '/rest/settings/library.json',
                data: {library_id: library_id}
            }).done(function (data) {
                show_alert('success', 'Library enable succesfully!');
                $(button).removeClass('enable-library-btn btn-success').addClass('disable-library-btn btn-danger');
                $(button).find('i').removeClass('ok-2').addClass('ban');
                $(button).closest('.card.card-device').removeClass('disabled');
            }).fail(function (data) {
                data = JSON.parse(data.responseText);
                show_alert('error', data.message);
            });
        });

        // REFRESH ALL LIBRARIES
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
    });
</script>