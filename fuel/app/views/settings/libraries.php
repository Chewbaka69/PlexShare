<div class="settings-container">
    <div class="filter-bar">
        <button class="toggle-advanced-btn btn btn-sm Button-primary-2LQVw pull-left add-libraries"
                data-placement="top" data-toggle="tooltip" data-original-title="Add library"><i class="glyphicon circle-plus"></i></button>
        <button class="toggle-advanced-btn btn btn-sm btn-default pull-right refresh">Refresh Libraries &nbsp;<i class="glyphicon refresh"></i></button>
    </div>
    <div class="devices-container row">
        <div class="device-list-container col-sm-12 col-md-12">
            <ul class="list card-tile-list">
                <?php if($libraries) : ?>
                <?php foreach ($libraries as $library) : ?>
                <li class="card-tile-list-item card-3-col-item">
                    <div class="card card-device">
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
                            <button class="remove-libraries-btn card-action-btn btn-danger"
                                    data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                <i class="glyphicon remove-2"></i>
                            </button>
                        </div>
                        <h4 class="name"><?php echo $library->name; ?> <span class="glyphicon ok-2 text-success"></span></h4>
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