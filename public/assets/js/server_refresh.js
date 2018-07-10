// ACTION UPDATE ALL DATA SERVER AND BROWSING IT
var ajax = 0;
var alert = $('.alert.alert-status');
var alert_status = $('.alert.alert-status .status');

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
function updateLibrary(server, library) {
    ajax += 1;
    setTimeout(function () {
        alert_status.html('Browsing library ' + library.name + ' on server ' + server.name );
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
    }, 1000);
}
function updateContentLibraries(server, libaries) {
    $(libaries).each(function (index,library) {
        ajax += 1;
        setTimeout(function () {
            alert_status.html('Browsing library ' + library.name + ' on server ' + server.name );
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