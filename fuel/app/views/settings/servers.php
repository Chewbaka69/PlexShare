<div class="settings-container">
    <div class="filter-bar">
        <button class="toggle-advanced-btn btn btn-sm Button-primary-2LQVw pull-left add"
                data-placement="top" data-toggle="tooltip" data-original-title="Add server"><i class="glyphicon circle-plus"></i></button>
        <button class="toggle-advanced-btn btn btn-sm btn-default pull-right refresh">Refresh Servers &nbsp;<i class="glyphicon refresh"></i></button>
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
                            <button class="edit-device-btn card-action-btn btn-info"
                                    data-placement="top" data-toggle="tooltip" data-original-title="Refresh">
                                <i class="glyphicon refresh"></i>
                            </button>
                            <button class="edit-device-btn card-action-btn"
                                    data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                <i class="glyphicon pencil"></i>
                            </button>
                            <button class="edit-device-btn card-action-btn btn-danger"
                                    data-placement="top" data-toggle="tooltip" data-original-title="Disable">
                                <i class="glyphicon ban"></i>
                            </button>
                            <button class="remove-libraries-btn card-action-btn btn-danger" data-server-id="<?php echo $server->id; ?>"
                                    data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                <i class="glyphicon remove-2"></i>
                            </button>
                        </div>
                        <h4 class="name"><?php echo $server->name; ?> <span data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $server->online ? 'online' : 'offline' ; ?>" class="glyphicon <?php echo $server->online ? 'server text-success' : 'server-ban text-danger' ; ?>"></span></h4>
                        <div class="card-details">
                            <div class="pull-right">
                                <div class="last-seen text-muted"><i class="plex-icon-watch-later-560"></i> <?php echo $server->getLastCheck(); ?></div>
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
    $(function() {
        $('.filter-bar .add').on('click', function () {
            $.ajax({
                method: 'get',
                url: '/rest/settings/add_server.json'
            }).done(function (data) {
                $('body').append(data).delay(100).queue(function() {
                    $('.media-server-modal').removeClass('out').addClass('in');
                });
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
        $(document).on('click', 'button.remove-device-btn', function () {
            var button = this;
            var server_id = $(this).data('server-id');
            $.ajax({
                method: 'delete',
                url: '/rest/settings/server.json',
                data: {server_id: server_id}
            }).done(function (data) {
                show_alert('success', 'Server delete succesfully!');
                $(button).closest('li').get(0).remove();
            }).fail(function (data) {
                data = JSON.parse(data.responseText);
                show_alert('error', data.message);
            });
        });
    });
    // UPDATE DATA SERVER AND BROWSING
    var ajax = 0;
    var alert = $('.alert.alert-status');
    var alert_status = $('.alert.alert-status .status');
    $(function() {
        $('.filter-bar .refresh').on('click', function () {
            ajax += 1;
            checkAjax();
            $.ajax({
                method: 'get',
                url: '/rest/browse/servers.json'
            }).done(function (data) {
                updateServers(data);
                ajax -= 1;
                alert.toggleClass('transition-out');
                alert_status.html('Browse all your server is GOOD!');
            });
        });
    });
    function updateServers(servers) {
        $(servers).each(function (index,server) {
            ajax += 1;
            setTimeout(function () {
                alert_status.html('Browsing server ' + server.name);
                $.ajax({
                    method: 'put',
                    url: '/rest/browse/server.json',
                    data: {server_id: server.id}
                }).done(function (data) {
                    updateLibraries(server);
                    ajax -= 1;
                });
            }, (index + 1) * 1000);
        });
    }
    function updateLibraries(server) {
        ajax += 1;
        alert_status.html('Getting all libraries on server ' + server.name);
        $.ajax({
            method: 'get',
            url: '/rest/browse/libraries.json',
            data: {server_id: server.id}
        }).done(function (data) {
            updateContentLibraries(server, data.libraries);
            ajax -= 1;
        });
    }
    function updateContentLibraries(server, libaries) {
        $(libaries).each(function (index,library) {
            ajax += 1;
            setTimeout(function () {
                alert_status.html('Browsing library ' + library.name + ' on server ' + server.name);
                $.ajax({
                    method: 'get',
                    url: '/rest/browse/subcontent.json',
                    data: {server_id: server.id, library_id: library.id}
                }).done(function (data) {
                    if(data.movies !== undefined) {
                        updateMovies(server, data.movies, library, null);
                    }
                    if(data.tvshows !== undefined) {
                        updateTvShows(server, data.tvshows);
                    }
                    ajax -= 1;
                });
            }, (index + 1) * 1000);
        });
    }
    function updateTvShows(server, tvshows) {
        $(tvshows).each(function (index,tvshow) {
            ajax += 1;
            setTimeout(function () {
                alert_status.html('Browsing TV Show ' + tvshow.name + ' on server ' + server.name);
                $.ajax({
                    method: 'get',
                    url: '/rest/browse/seasons.json',
                    data: {server_id: server.id, tvshow_id: tvshow.id}
                }).done(function (data) {
                    updateSeasons(server, tvshow, data.seasons);
                    ajax -= 1;
                });
            }, (index + 1) * 1000);
        });
    }
    function updateSeasons(server, tvshow, seasons) {
        $(seasons).each(function (index,season) {
            ajax += 1;
            setTimeout(function () {
                alert_status.html('Browsing ' + season.name + ' ' + tvshow.name + ' on server ' + server.name);
                $.ajax({
                    method: 'get',
                    url: '/rest/browse/movies.json',
                    data: {server_id: server.id, season_id: season.id}
                }).done(function (data) {
                    updateMovies(server, data.movies, null, season);
                    ajax -= 1;
                });
            }, (index + 1) * 1000);
        });
    }
    function updateMovies(server, movies, library, season) {
        /*$(movies).each(function (index,movie) {
            setTimeout(function () {
                alert_status.html('Browsing movie ' + movie.name + ' on server ' + server.name);
                $.ajax({
                    method: 'get',
                    url: '/rest/browse/movies.json',
                    data: {server_id: server.id, season_id: season.id}
                }).done(function (data) {
                    updateMovies(server, data.movies, null, season);
                    ajax -= 1;
                });
            }, (index + 1) * 1000);
        });*/
    }
    function checkAjax() {
        var interval = setInterval(function () {
            if(ajax === 0) {
                clearInterval(interval);
                alert_status.html('Browsing servers is finished!');
                alert.delay(1000).toggleClass('transition-out');
            }
        }, 1000);
    }
</script>