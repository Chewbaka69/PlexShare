<div class="settings-container">
    <div class="web-settings-container show-advanced">
        <div class="filter-bar"></div>
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <ul class="settings-nav nav nav-cards">
                    <li><a class="card btn-gray selected" href="#general-web-group">General</a></li>
                    <li><a class="card btn-gray" href="#subaccount-web-group">Sub Account</a></li>
                    <li><a class="card btn-gray" href="#player-web-group">Player</a></li>
                </ul>
            </div>
            <div class="col-sm-8 col-md-9">
                <form id="web-settings-form" method="post">
                    <div id="general-web-group" class="settings-group active">
                        <h4 class="version-title"> Version 0.62 </h4>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <select id="language" name="language">
                                <option value="english"> English</option>
                                <option value="french"> Français</option>
                            </select>
                            <p class="help-block">

                            </p>
                        </div>
                    </div>
                    <div id="subaccount-web-group" class="settings-group">
                        <h4 class="settings-header-first">Sub Account</h4>
                        <h6><button class="btn btn-primary"><i class="glyphicon circle-plus"></i> Add sub account</button></h6>
                        <div class="device-list-container col-sm-12">
                            <ul class="list card-tile-list">
                                <li class="card-tile-list-item card-2-col-item">
                                    <div class="card card-device">
                                        <div class="card-actions">
                                            <button class="remove-device-btn card-action-btn" title="Permissions" data-toggle="tooltip" data-placement="top">
                                                <i class="glyphicon unlock"></i>
                                            </button>
                                            <button class="remove-device-btn card-action-btn btn-danger" title="Delete" data-toggle="tooltip" data-placement="top">
                                                <i class="glyphicon remove-2"></i>
                                            </button>
                                        </div>
                                        <h4 class="name">Chewbaka</h4>
                                        <div class="card-details">
                                            <div class="version text-muted">Last use: an hour ago</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="player-web-group" class="settings-group">
                        <h4 class="settings-header-first">Streaming</h4>
                        <div class="form-group">
                            <label for="remoteQuality">Video Quality</label>
                            <select id="remoteQuality" name="remoteQuality" data-type="int">
                                <option value="-1">Maximale</option>
                                <option value="20000"> 20 Mbps, 1080p</option>
                                <option value="12000"> 12 Mbps, 1080p</option>
                                <option value="10000"> 10 Mbps, 1080p</option>
                                <option value="8000"> 8 Mbps, 1080p</option>
                                <option value="4000"> 4 Mbps, 720p</option>
                                <option value="3000"> 3 Mbps, 720p</option>
                                <option value="2000" selected=""> 2 Mbps, 720p</option>
                                <option value="1500"> 1.5 Mbps, 480p</option>
                                <option value="700"> 0.7 Mbps</option>
                                <option value="300"> 0.3 Mbps</option>
                                <option value="200"> 0.2 Mbps</option>
                            </select>
                            <p class="help-block">Set the default quality for streaming video over the internet. If
                                quality is set too high, videos will start slowly and pause frequently.</p></div>
                        <div class="form-group">
                            <label for="subtitleSize">Subtitle Size</label>
                            <select id="subtitleSize" name="subtitleSize" data-type="int">
                                <option value="50">Tiny</option>
                                <option value="75">Small</option>
                                <option value="100" selected="">Normal</option>
                                <option value="125">Large</option>
                                <option value="200">Huge</option>
                            </select>
                        </div>
                        <h4 class="settings-header">Bonus</h4>
                        <div class="form-group">
                            <label for="typeTrailer">Cinema Trailers Type</label>
                            <select id="typeTrailer" name="typeTrailer" data-type="string">
                                <option value="Cinema">In Cinema</option>
                                <option value="Upcoming" selected="">Upcoming</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="trailerCount">Cinema Trailers to Play Before Movies</label>
                            <select id="trailerCount" name="trailerCount" data-type="int">
                                <option value="0" selected="">None</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button name="submit" type="submit" class="submit-btn btn btn-lg btn-primary disabled">
                            <span class="btn-label">Enregistrer les modifications</span></button>
                        <span class="form-message"></span></div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(window).on('load', function () {
        if(window.location.hash !== '') {
            var href = window.location.hash;

            $('.settings-nav li .card').removeClass('selected');
            $('.settings-nav li .card[href="' + href + '"]').addClass('selected');

            $('#web-settings-form .settings-group').removeClass('active');
            $(href).addClass('active');
        }
        $(document).on('change', 'form#web-settings-form', function (event) {
           $('button[type="submit"]').removeClass('disabled');
        });
        $(document).on('click', '.settings-nav li .card', function (event) {
            $('.settings-nav li .card').removeClass('selected');
            $(this).addClass('selected');

            var href = $(this).attr('href');

            $('#web-settings-form .settings-group').removeClass('active');
            $(href).addClass('active');
        });
    });
</script>