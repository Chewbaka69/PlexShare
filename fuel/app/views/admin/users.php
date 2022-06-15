<div class="settings-container">
    <div class="filter-bar">
    </div>
    <div class="devices-container row">
        <div class="device-list-container col-sm-12 col-md-12">
            <ul class="list card-tile-list">
                <?php if($users) : ?>
                    <?php foreach ($users as $user) : ?>
                        <li class="card-tile-list-item card-3-col-item">
                            <div class="card card-device <?php echo $user->disable ? 'disabled' : ''; ?>">
                                <div class="card-actions">
                                    <a href="/admin/users/premissions/<?php echo $user->id; ?>">
                                        <button class="permissions-user-btn card-action-btn" data-library-id="<?php echo $user->id; ?>"
                                                data-toggle="tooltip" data-original-title="Permissions">
                                            <i class="glyphicon unlock"></i>
                                        </button>
                                    </a>
                                    <?php if($user->disable) : ?>
                                        <button class="enable-user-btn card-action-btn btn-success" data-library-id="<?php echo $user->id; ?>"
                                                data-toggle="tooltip" data-original-title="Enable">
                                            <i class="glyphicon ok-2"></i>
                                        </button>
                                    <?php else: ?>
                                        <button class="disable-user-btn card-action-btn btn-danger" data-library-id="<?php echo $user->id; ?>"
                                                data-toggle="tooltip" data-original-title="Disable">
                                            <i class="glyphicon ban"></i>
                                        </button>
                                    <?php endif; ?>
                                    <button class="remove-user-btn card-action-btn btn-danger" data-library-id="<?php echo $user->id; ?>"
                                            data-toggle="tooltip" data-original-title="Delete">
                                        <i class="glyphicon remove-2"></i>
                                    </button>
                                </div>
                                <h4 class="name">
                                    <?php echo $user->username; ?>
                                    <span class="glyphicon <?php echo $user->disable ? 'ban text-danger' : 'ok-2 text-success'; ?>" data-toggle="tooltip" data-original-title="<?php echo $user->disable ? 'Disabled' : 'Enabled'; ?>"></span>
                                </h4>
                                <div class="card-details">
                                    <div class="pull-right">
                                    <div class="last-seen text-muted" data-toggle="tooltip" data-original-title="Last login">
                                        <i class="plex-icon-watch-later-560"></i> <?php echo $user->getLastLogin(); ?>
                                    </div>
                                    </div>
                                    <span class="version text-muted"><?php echo $user->email; ?></span>
                                    <div class="device-info-container">
                                        <div class="product"><?php echo $user->admin ? 'Admin' : 'User'; ?></div>
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
        $('button.disable-library-btn').on('click', function () {
            var button = this;
            var library_id = $(this).data('library-id');
            $.ajax({
                method: 'delete',
                url: '/rest/settings/library.json',
                data: {library_id: library_id}
            }).done(function (data) {
                show_alert('success', 'Library disable succesfully!');
                $(button).closest('.card.card-device').addClass('disabled');
            }).fail(function (data) {
                data = JSON.parse(data.responseText);
                show_alert('error', data.message);
            });
        });
    });
</script>