<!DOCTYPE html>
<html lang="en">
<head>
    <title>Plex Share :: Install</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <?php
        echo \Asset::css(['normalize.css', 'plex.css']);
    ?>
</head>
<body>
<div id="plex" class="application">
    <div class="nav-bar" style="height: 50px">
    </div>
    <div class="background-container">
        <div data-reactroot="" class="FullPage-container-3qanw">
            <div>
                <div>
                    <div style="background-image: url(&quot;//assets.plex.tv/deploys/desktop/env-eb2798cc3c7d9533df5b563963d5c394/3.34.1-b51c37a/common/img/backgrounds/preset-light.770a0981b66e038d3ffffbcc4f5a26a4.png&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                         class=""></div>
                </div>
                <div style="position: absolute; width: 100%; height: 100%; background: rgba(0, 0, 0, 0) url(&quot;//assets.plex.tv/deploys/desktop/env-eb2798cc3c7d9533df5b563963d5c394/3.34.1-b51c37a/common/img/backgrounds/noise.8b05ce45d0df59343e206bc9ae78d85d.png&quot;) repeat scroll 0% 0%; z-index: 2;"></div>
            </div>
        </div>
    </div>
    <div id="content" class="scroll-container dark-scrollbar">
        <div class="FullPage-container-3qanw Scroller-scroller-d5-b- Scroller-vertical-1bgGS">
            <div class="container" style="width: 100%">
                <h2>Configuration</h2>
                <div class="settings-container">
                    <div class="web-settings-container">
                        <div class="row">
                            <div class="col-sm-4 col-md-3">
                                <ul class="settings-nav nav nav-cards">
                                    <li><a class="card btn-gray selected" href="#checking">Configuration</a></li>
                                    <li><a class="card btn-gray" href="#SQL">Configuration SQL</a></li>
                                    <li><a class="card btn-gray" href="#create-table">Create Tables</a></li>
                                    <li><a class="card btn-gray" href="#admin">Create Admin Account</a></li>
                                    <li><a class="card btn-gray" href="#config-plex">Add plex server</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9">
                                <div id="checking" class="card-content">
                                    <div class="Page-page-aq7i_">
                                        <div class="PageHeader-pageHeader-18RSw">
                                            We are checking if your server had all need
                                        </div>
                                        <div class="MetadataTableHeader-tableHeader-2bHAm">
                                            <div class="MetadataTableHeader-tableHeaderCell-61R48 MetadataTableCell-tableCell-35117"
                                                 style="flex: 2 1 350px;">
                                                <div class="MetadataTableHeader-tableHeaderTitle-2CMNj">Checking List
                                                </div>
                                            </div>
                                            <div class="MetadataTableHeader-actionsCell-1RppT MetadataTableRow-libraryActionsCell-2OOmP MetadataTableRow-actionsCell-1ax6E MetadataTableHeader-tableHeaderCell-61R48 MetadataTableCell-tableCell-35117">

                                            </div>
                                        </div>
                                        <div class="MetadataListPageContent-metadataListPageContent-s56y9 PageContent-pageContent-16mK6">
                                            <div class="MetadataListPageContent-metadataListScroller-1uFgY"
                                                 style="position: relative">
                                                <div class=" " style="">
                                                    <div class="MetadataTableRow-item-11DH-" id="version"
                                                         style="width: 100%; height: 40px; transform: translate3d(0px, 0px, 0px);">
                                                        <div class="MetadataTableRow-overlay-1RiId">
                                                            <div class="MetadataTableCell-tableCell-35117"
                                                                 style="flex: 2 1 350px;"><span
                                                                        class="MetadataTableCell-title-3KMG0"><div
                                                                            class="MetadataTableTitle-titleContainer-3sPQC"><span
                                                                                class="MetadataTableTitle-title-2WmEM">PHP 5.6 >= </span><span></span></div></span>
                                                            </div>
                                                            <div class="MetadataTableRow-libraryActionsCell-2OOmP MetadataTableRow-actionsCell-1ax6E">
                                                                <div class="loading hidden"
                                                                     style="margin: auto; left: 0; top: 0; position: relative"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="MetadataTableRow-alternateItem-1-jtp MetadataTableRow-item-11DH-"
                                                         id="mysql"
                                                         style="width: 100%; height: 40px; transform: translate3d(0px, 0px, 0px);">
                                                        <div class="MetadataTableRow-overlay-1RiId">
                                                            <div class="MetadataTableCell-tableCell-35117"
                                                                 style="flex: 2 1 350px;"><span
                                                                        class="MetadataTableCell-title-3KMG0"><div
                                                                            class="MetadataTableTitle-titleContainer-3sPQC"><span
                                                                                class="MetadataTableTitle-title-2WmEM">PHP Extension MYSQL </span><span></span></div></span>
                                                            </div>
                                                            <div class="MetadataTableRow-libraryActionsCell-2OOmP MetadataTableRow-actionsCell-1ax6E">
                                                                <div class="loading hidden"
                                                                     style="margin: auto; left: 0; top: 0; position: relative"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="MetadataTableRow-item-11DH-"
                                                         id="mysqli"
                                                         style="width: 100%; height: 40px; transform: translate3d(0px, 0px, 0px);">
                                                        <div class="MetadataTableRow-overlay-1RiId">
                                                            <div class="MetadataTableCell-tableCell-35117"
                                                                 style="flex: 2 1 350px;"><span
                                                                        class="MetadataTableCell-title-3KMG0"><div
                                                                            class="MetadataTableTitle-titleContainer-3sPQC"><span
                                                                                class="MetadataTableTitle-title-2WmEM">PHP Extension MYSQLi </span><span></span></div></span>
                                                            </div>
                                                            <div class="MetadataTableRow-libraryActionsCell-2OOmP MetadataTableRow-actionsCell-1ax6E">
                                                                <div class="loading hidden"
                                                                     style="margin: auto; left: 0; top: 0; position: relative"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="MetadataTableRow-alternateItem-1-jtp MetadataTableRow-item-11DH-"
                                                         id="pdo_sql"
                                                         style="width: 100%; height: 40px; transform: translate3d(0px, 0px, 0px);">
                                                        <div class="MetadataTableRow-overlay-1RiId">
                                                            <div class="MetadataTableCell-tableCell-35117"
                                                                 style="flex: 2 1 350px;"><span
                                                                        class="MetadataTableCell-title-3KMG0"><div
                                                                            class="MetadataTableTitle-titleContainer-3sPQC"><span
                                                                                class="MetadataTableTitle-title-2WmEM">PHP Extension PDO_SQL </span><span></span></div></span>
                                                            </div>
                                                            <div class="MetadataTableRow-libraryActionsCell-2OOmP MetadataTableRow-actionsCell-1ax6E">
                                                                <div class="loading hidden"
                                                                     style="margin: auto; left: 0; top: 0; position: relative"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="MetadataTableRow-alternateItem-1-jtp MetadataTableRow-item-11DH-"
                                                         id="simplexml"
                                                         style="width: 100%; height: 40px; transform: translate3d(0px, 0px, 0px);">
                                                        <div class="MetadataTableRow-overlay-1RiId">
                                                            <div class="MetadataTableCell-tableCell-35117"
                                                                 style="flex: 2 1 350px;"><span
                                                                        class="MetadataTableCell-title-3KMG0"><div
                                                                            class="MetadataTableTitle-titleContainer-3sPQC"><span
                                                                                class="MetadataTableTitle-title-2WmEM">PHP Extension SimpleXML </span><span></span></div></span>
                                                            </div>
                                                            <div class="MetadataTableRow-libraryActionsCell-2OOmP MetadataTableRow-actionsCell-1ax6E">
                                                                <div class="loading hidden"
                                                                     style="margin: auto; left: 0; top: 0; position: relative"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="MetadataTableRow-item-11DH-"
                                                         id="curl"
                                                         style="width: 100%; height: 40px; transform: translate3d(0px, 0px, 0px);">
                                                        <div class="MetadataTableRow-overlay-1RiId">
                                                            <div class="MetadataTableCell-tableCell-35117"
                                                                 style="flex: 2 1 350px;"><span
                                                                        class="MetadataTableCell-title-3KMG0"><div
                                                                            class="MetadataTableTitle-titleContainer-3sPQC"><span
                                                                                class="MetadataTableTitle-title-2WmEM">PHP Extension cURL </span><span></span></div></span>
                                                            </div>
                                                            <div class="MetadataTableRow-libraryActionsCell-2OOmP MetadataTableRow-actionsCell-1ax6E">
                                                                <div class="loading hidden"
                                                                     style="margin: auto; left: 0; top: 0; position: relative"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="MetadataTableRow-alternateItem-1-jtp MetadataTableRow-item-11DH-"
                                                         id="config"
                                                         style="width: 100%; height: 40px; transform: translate3d(0px, 0px, 0px);">
                                                        <div class="MetadataTableRow-overlay-1RiId">
                                                            <div class="MetadataTableCell-tableCell-35117"
                                                                 style="flex: 2 1 350px;"><span
                                                                        class="MetadataTableCell-title-3KMG0"><div
                                                                            class="MetadataTableTitle-titleContainer-3sPQC"><span
                                                                                class="MetadataTableTitle-title-2WmEM">Config file writable</span><span></span></div></span>
                                                            </div>
                                                            <div class="MetadataTableRow-libraryActionsCell-2OOmP MetadataTableRow-actionsCell-1ax6E">
                                                                <div class="loading hidden"
                                                                     style="margin: auto; left: 0; top: 0; position: relative"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-lg btn-primary btn-loading col-sm-4" type="button"
                                                onclick="check_require()">
                                            <span class="btn-label">Check it!</span>
                                        </button>
                                        <button class="btn btn-lg btn-link btn-loading col-sm-offset-8 col-sm-4 hidden"
                                                type="button"
                                                onclick="next()">
                                            <span class="btn-label">Next ></span>
                                        </button>
                                    </div>
                                </div>
                                <div id="SQL" class="card-content hidden">
                                    <div class="FormGroup-group-15o1H">
                                        <form class="Page-page-aq7i_">
                                            <div class="PageHeader-pageHeader-18RSw">
                                                Saving Mysql information:
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="host">
                                                    Mysql Host:
                                                </label>
                                                <input id="host" name="host" placeholder="127.0.0.1"
                                                       value="<?php echo $db_host ?: ''; ?>"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="text"/>
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="port">
                                                    Mysql port:
                                                </label>
                                                <input id="port" name="port" placeholder="3306"
                                                       value="<?php echo $db_port ?: ''; ?>"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="text">
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="database">
                                                    Mysql DB name:
                                                </label>
                                                <input id="database" name="database" placeholder="PlexShare_Database"
                                                       value="<?php echo $db_database ?: ''; ?>"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="text">
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="prefix">
                                                    Table prefix:
                                                </label>
                                                <input id="prefix" name="prefix" placeholder="pshare_"
                                                       value="<?php echo $db_prefix ?: ''; ?>"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="text">
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="username">
                                                    Mysql Username:
                                                </label>
                                                <input id="username" name="username" placeholder="PexShareUser"
                                                       value="<?php echo $db_username ?: ''; ?>"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="text">
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="password">
                                                    Mysql Password:
                                                </label>
                                                <input id="password" name="password" placeholder="••••••••••••••"
                                                       value="<?php echo $db_password ?: ''; ?>"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="password">
                                            </div>
                                        </form>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-loading col-sm-4"
                                            onclick="save_dbconfig()">
                                        <span class="btn-label">Save it!</span>
                                    </button>
                                    <button class="btn btn-lg btn-link btn-loading col-sm-offset-8 col-sm-4 hidden"
                                            type="button"
                                            onclick="next()">
                                        <span class="btn-label">Next ></span>
                                    </button>
                                </div>
                                <div id="create-table" class="card-content hidden">
                                    <div class="FormGroup-group-15o1H">
                                        <form class="Page-page-aq7i_">
                                            <div class="PageHeader-pageHeader-18RSw">
                                                Table creation information:
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="table">
                                                    Table creation:
                                                </label>
                                                <textarea id="table"
                                                          style="max-width: 800px; min-width: 100%; height: 150px; border-radius: 5px"
                                                          class="TextInput-input-34u_B TextInput-large-3XjFh input-large-1cY_k"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-loading col-sm-4"
                                            onclick="create_tables()">
                                        <span class="btn-label">Launch creation table!</span>
                                    </button>
                                    <button class="btn btn-lg btn-link btn-loading col-sm-offset-8 col-sm-4 hidden"
                                            type="button"
                                            onclick="next()">
                                        <span class="btn-label">Next ></span>
                                    </button>
                                </div>
                                <div id="admin" class="card-content hidden">
                                    <div class="FormGroup-group-15o1H">
                                        <form class="Page-page-aq7i_">
                                            <div class="PageHeader-pageHeader-18RSw">
                                                Create Admin account:
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="email">
                                                    Admin Email:
                                                </label>
                                                <input id="email" name="email" placeholder="admin@domain.tld"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="text">
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="username">
                                                    Admin Username:
                                                </label>
                                                <input id="username" name="username" placeholder="Admin"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="text">
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="password">
                                                    Admin Password:
                                                </label>
                                                <input id="password" name="password" placeholder="••••••••••••••"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="password">
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="cpassword">
                                                    Admin Password Confirmation:
                                                </label>
                                                <input id="cpassword" name="cpassword" placeholder="••••••••••••••"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="password">
                                            </div>
                                        </form>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-loading col-sm-4"
                                            onclick="create_admin()">
                                        <span class="btn-label">Save it!</span>
                                    </button>
                                    <button class="btn btn-lg btn-link btn-loading col-sm-offset-8 col-sm-4 hidden"
                                            type="button"
                                            onclick="window.location.replace('/login');">
                                        <span class="btn-label">Finish!</span>
                                    </button>
                                </div>
                                <div id="config-plex" class="card-content hidden">
                                    <div class="FormGroup-group-15o1H">
                                        <form class="Page-page-aq7i_">
                                            <div class="PageHeader-pageHeader-18RSw">
                                                Plex information:
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="url">
                                                    Plex URL:
                                                </label>
                                                <input id="url" name="url" placeholder="127.0.0.1"
                                                       value="<?php echo isset($plex_url) ? $plex_url : ''; ?>"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="text">
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="port">
                                                    Plex Port:
                                                </label>
                                                <input id="port" name="port" placeholder="3306"
                                                       value="<?php echo isset($plex_port) ? $plex_port : ''; ?>"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="text">
                                            </div>
                                            <div>
                                                <label class="FormLabel-label-1sr1f " for="token">
                                                    Plex Token:
                                                </label>
                                                <input id="token" name="token" placeholder="YOURTOKEN"
                                                       value="<?php echo isset($plex_token) ? $plex_token : ''; ?>"
                                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                                       type="text">
                                            </div>
                                        </form>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-loading col-sm-4"
                                            onclick="check_plex()">
                                        <span class="btn-label">Save it!</span>
                                    </button>
                                    <button class="btn btn-lg btn-link btn-loading col-sm-offset-8 col-sm-4 hidden"
                                            type="button"
                                            onclick="next()">
                                        <span class="btn-label">Next ></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var links = document.querySelectorAll('.nav-cards a.card');

    for (var i = 0; i < links.length; i++) {
        links[i].addEventListener('click', function (event) {
            document.querySelector('.card.selected').classList.remove('selected');
            this.classList.add('selected');
            hide_card_content();
            var anchor = this.getAttribute('href');
            document.querySelector(anchor).classList.remove('hidden');
        });
    }

    function hide_card_content() {
        var cardContents = document.querySelectorAll('.card-content');

        for (var i = 0; i < cardContents.length; i++) {
            if (!cardContents[i].classList.contains('hidden'))
                cardContents[i].classList.add('hidden');
        }
    }

    function next() {
        var menu = document.querySelectorAll('.settings-nav li');

        for (var i = 0; i < menu.length; i++) {
            if (menu[i].firstChild.classList.contains('selected')) {
                menu[i + 1].firstChild.click();
                return;
            }
        }
    }

    function check_require() {

        var button = document.querySelector('#checking button');
        var next = document.querySelector('#checking button.hidden');

        button.classList.add('hidden');
        next.classList.remove('hidden');

        var versionLoading = document.querySelector('#version .loading');
        versionLoading.classList.remove('hidden');

        var mysqlLoading = document.querySelector('#mysql .loading');
        mysqlLoading.classList.remove('hidden');

        var mysqliLoading = document.querySelector('#mysqli .loading');
        mysqliLoading.classList.remove('hidden');

        var pdosqlLoading = document.querySelector('#pdo_sql .loading');
        pdosqlLoading.classList.remove('hidden');

        var simplexmlLoading = document.querySelector('#simplexml .loading');
        simplexmlLoading.classList.remove('hidden');

        var curlLoading = document.querySelector('#curl .loading');
        curlLoading.classList.remove('hidden');

        var configLoading = document.querySelector('#config .loading');
        configLoading.classList.remove('hidden');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/rest/install/require.json');

        xhr.addEventListener('readystatechange', function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                var result = JSON.parse(xhr.responseText);

                var element = document.createElement('i');
                var color_agree = '#5cb85c';
                var color_error = '#ac3323';

                versionLoading.classList.add('hidden');
                if (result['version'] === true) {
                    element.classList.add('glyphicon', 'circle-ok', 'glyphicon-2x');
                    element.style.color = color_agree;
                    element.style.margin = 'auto';

                    versionLoading.after(element);
                } else {
                    element.classList.add('glyphicon', 'circle-exclamation-mark', 'glyphicon-2x');
                    element.style.color = color_error;
                    element.style.margin = 'auto';

                    versionLoading.after(element);
                }

                element = document.createElement('i');

                mysqlLoading.classList.add('hidden');
                if (result['mysql'] === true) {
                    element.classList.add('glyphicon', 'circle-ok', 'glyphicon-2x');
                    element.style.color = color_agree;
                    element.style.margin = 'auto';

                    mysqlLoading.after(element);
                } else {
                    element.classList.add('glyphicon', 'circle-exclamation-mark', 'glyphicon-2x');
                    element.style.color = color_error;
                    element.style.margin = 'auto';

                    mysqlLoading.after(element);
                }

                element = document.createElement('i');

                mysqliLoading.classList.add('hidden');
                if (result['mysqli'] === true) {
                    element.classList.add('glyphicon', 'circle-ok', 'glyphicon-2x');
                    element.style.color = color_agree;
                    element.style.margin = 'auto';

                    mysqliLoading.after(element);
                } else {
                    element.classList.add('glyphicon', 'circle-exclamation-mark', 'glyphicon-2x');
                    element.style.color = color_error;
                    element.style.margin = 'auto';

                    mysqliLoading.after(element);
                }

                element = document.createElement('i');

                pdosqlLoading.classList.add('hidden');
                if (result['pdo_mysql'] === true) {
                    element.classList.add('glyphicon', 'circle-ok', 'glyphicon-2x');
                    element.style.color = color_agree;
                    element.style.margin = 'auto';

                    pdosqlLoading.after(element);
                } else {
                    element.classList.add('glyphicon', 'circle-exclamation-mark', 'glyphicon-2x');
                    element.style.color = color_error;
                    element.style.margin = 'auto';

                    pdosqlLoading.after(element);
                }

                element = document.createElement('i');

                simplexmlLoading.classList.add('hidden');
                if (result['simplexml'] === true) {
                    element.classList.add('glyphicon', 'circle-ok', 'glyphicon-2x');
                    element.style.color = color_agree;
                    element.style.margin = 'auto';

                    simplexmlLoading.after(element);
                } else {
                    element.classList.add('glyphicon', 'circle-exclamation-mark', 'glyphicon-2x');
                    element.style.color = color_error;
                    element.style.margin = 'auto';

                    simplexmlLoading.after(element);
                }

                element = document.createElement('i');

                curlLoading.classList.add('hidden');
                if (result['curl'] === true) {
                    element.classList.add('glyphicon', 'circle-ok', 'glyphicon-2x');
                    element.style.color = color_agree;
                    element.style.margin = 'auto';

                    curlLoading.after(element);
                } else {
                    element.classList.add('glyphicon', 'circle-exclamation-mark', 'glyphicon-2x');
                    element.style.color = color_error;
                    element.style.margin = 'auto';

                    curlLoading.after(element);
                }

                element = document.createElement('i');

                configLoading.classList.add('hidden');
                if (result['config'] === true) {
                    element.classList.add('glyphicon', 'circle-ok', 'glyphicon-2x');
                    element.style.color = color_agree;
                    element.style.margin = 'auto';

                    configLoading.after(element);
                } else {
                    element.classList.add('glyphicon', 'circle-exclamation-mark', 'glyphicon-2x');
                    element.style.color = color_error;
                    element.style.margin = 'auto';

                    configLoading.after(element);
                }

            }
        });

        xhr.send(null);
    }

    function save_dbconfig() {
        var button = document.querySelector('#SQL button');
        var next = document.querySelector('#SQL button.hidden');

        var data = new FormData(document.querySelector('#SQL form'));

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/rest/install/config.json');

        xhr.addEventListener('readystatechange', function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                var result = JSON.parse(xhr.responseText);
                if(result.error === true) {
                    show_alert('error', result.message);
                } else {
                    button.classList.add('hidden');
                    next.classList.remove('hidden');
                }
            }
        });

        xhr.send(data);
    }

    function create_tables() {
        var button = document.querySelector('#create-table button');
        var next = document.querySelector('#create-table button.hidden');

        var data = new FormData(document.querySelector('#create-table form'));

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/rest/install/tables.json');

        xhr.addEventListener('readystatechange', function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                console.log(xhr.status);
                if(xhr.status === 500) {
                    return show_alert('error', 'Configuration SQL error or check the log error!');
                }

                var result = JSON.parse(xhr.responseText);
                if(result.error === true) {
                    show_alert('error', result.message);
                } else {
                    document.getElementById('table').value = result.message;
                    button.classList.add('hidden');
                    next.classList.remove('hidden');
                }
            }
        });

        xhr.send(data);
        document.getElementById('table').value = 'Please wait we are creating your tables!';
    }

    function create_admin() {
        var button = document.querySelector('#admin button');
        var next = document.querySelector('#admin button.hidden');

        var data = new FormData(document.querySelector('#admin form'));

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/rest/install/admin.json');

        xhr.addEventListener('readystatechange', function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if(xhr.status === 500)
                    return show_alert('error', xhr.responseText);

                var result = JSON.parse(xhr.responseText);
                if(result.error === true) {
                    show_alert('error', result.message);
                } else {
                    button.classList.add('hidden');
                    next.classList.remove('hidden');
                }
            }
        });

        xhr.send(data);
    }

    function check_plex() {
        var button = document.querySelector('#config-plex button');
        var next = document.querySelector('#config-plex button.hidden');

        var data = new FormData(document.querySelector('#config-plex form'));

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/rest/install/plex.json');

        xhr.addEventListener('readystatechange', function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                var result = JSON.parse(xhr.responseText);
                if(result.error === true) {
                    show_alert('error', result.message);
                } else {
                    button.classList.add('hidden');
                    next.classList.remove('hidden');
                }
            }
        });

        xhr.send(data);
    }
</script>
<?php echo $end_js; ?>
</body>
</html>