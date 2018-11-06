function toHHMMSS(num) {
    var sec_num = parseInt(num, 10); // don't forget the second param
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = '0'+hours;}
    if (minutes < 10) {minutes = '0'+minutes;}
    if (seconds < 10) {seconds = '0'+seconds;}

    var times = '';
    if(hours > 0){times += hours+':'}
    return times + minutes + ':' + seconds;
}

var player = null;

function launchPlayer(view) {
    var lastTimeMouseMoved = null;
    var timeout = null;
    var buffered = null;
    var totaltime = null;

    var data_movie = $(view)[0];
    var movie_src = $(data_movie).data('src');

    var videoControles = document.getElementById('video_controls');
    videoControles.innerHTML += view;

    initSliders();

    $('#divVideo').show();

    player = new Clappr.Player({
        source: movie_src,
        parentId: '#movie_stream',
        width: '100%',
        height: '100%',
        mediacontrol: false,
        playback: {
            preload: 'metadata',
            controls: false,
            recycleVideo: Clappr.Browser.isMobile
        },
        events: {
            onReady: function () {
                $('#movie_stream').find('.media-control, .player-poster').remove();
            },
            onPause: function () {
                $('button[data-qa-id="resumeButton"] i').toggleClass('plex-icon-player-play-560 plex-icon-player-pause-560');
                $('button[role="playCenter"]').show();
            },
            onTimeUpdate: function(progress) {
                var timeplay = progress.current;
                var percent = timeplay / totaltime;

                $('.media-time').html(toHHMMSS(timeplay));

                $('.SeekBar-seekBarFill-1Lcu0').css('transform', 'scaleX('+ percent +')');

                if(parseInt(percent * 100) > 1) {
                    ajaxPlayingMovies($('#data_movie_id').data('movie-id'));
                }
            }
        }
    });

    /** EVENT PLAYER WHEN LOADED GET TOTATL TIME **/
    player.core.getCurrentContainer().on(Clappr.Events.CONTAINER_LOADEDMETADATA, function(metadata) {
        totaltime = metadata.duration;
    });

    /** EVENT PLAYER TO GET CURRENT TIME **/
    /** BUFFER BAR PROGRESS **/
    player.core.getCurrentContainer().on(Clappr.Events.CONTAINER_PROGRESS, function(progress) {
        var buffer = progress.current / progress.total;
        $('.SeekBar-seekBarBuffer-3bUz9').css('transform', 'scaleX('+ buffer +')');
    });

    /** PLAY CENTER **/
    $(document).on('click', 'button[role="playCenter"]', function () {
        $('button[role="playCenter"]').hide();
        $(document).find('button[data-qa-id="resumeButton"] > i').toggleClass('plex-icon-player-play-560 plex-icon-player-pause-560');
        player.play();
    });
    /** RESUME **/
    $(document).on('click', 'button[data-qa-id="resumeButton"]', function () {
        if(!player.isPlaying())
            $('button[role="playCenter"]').click();
        else
            player.pause();
    });
    /** CLOSE **/
    $(document).on('click', '.AudioVideoPlayerControls-closeButton-2ULmA', function () {
        $('#divVideo').hide();
        player.destroy();
        videoControles.innerHTML = '';
        clearTimeout(timeout);
        clearTimeout(buffered);
    });
    /** FULLSCREEN **/
    $(document).on('click', '.FullPlayerTopControls-topButton-2iGrJ[data-qa-id="fullscreenButton"]', function () {
        if(document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement)
            exitFullScreen();
        else
            fullScreen();
    });

    /** SETTINGS AUDIO VIDEO AND SUBTITLES **/
    $(document).on('click', '.AudioVideoPlayerControls-buttonGroupRight-17650 .AudioVideoPlayerControls-auxButtons-2YhIh > button', function (event) {
        var video_audio_control = $('.AudioVideoPlaybackSettings-container-2pTAj.AudioVideoStripeContainer-container-MI02O');

        if(video_audio_control.css('transform') === 'matrix(1, 0, 0, 1, 0, 246)')
            video_audio_control.css('transform', 'translateY(0px)');
        else
            video_audio_control.css('transform', 'translateY(246px)');
    });
    /** HOVER PLAYER, BUTTON CENTER AND NAVBAR SHOW NAVBAR **/
    $(document).on('mouseover', '#movie_stream , button[role="playCenter"], .AudioVideoFullPlayer-topBar-2XUGM, .AudioVideoFullPlayer-bottomBar-2yixi, .AudioVideoPlaybackSettings-container-2pTAj.AudioVideoStripeContainer-container-MI02O', function (event) {
        clearTimeout(timeout);
        $('.AudioVideoFullPlayer-topBar-2XUGM').css('transform', 'translateY(60px)');
        $('.AudioVideoFullPlayer-bottomBar-2yixi').css('transform', 'translateY(-86px)');
    });
    /** BUTTON CENTER AND NAVBAR HIDE NAVBAR **/
    $(document).on('mouseleave', '#movie_stream, #video_controls', function (event) {
        $('.AudioVideoFullPlayer-topBar-2XUGM').css('transform', '');
        $('.AudioVideoFullPlayer-bottomBar-2yixi').css('transform', '');
        $('.AudioVideoPlaybackSettings-container-2pTAj.AudioVideoStripeContainer-container-MI02O').css('transform', 'translateY(246px)');
    });
    /** MOUSE MOVE ON PLAYER KEEP VISIBLE NAVBAR **/
    $(document).on('mousemove', '#movie_stream, button[role="playCenter"]', function () {
        $('button[role="playCenter"], #movie_stream').css('cursor', 'pointer');
        $('button[role="playCenter"], .AudioVideoFullPlayer-topBar-2XUGM, .AudioVideoFullPlayer-bottomBar-2yixi').mouseover();
        lastTimeMouseMoved = new Date().getTime();
        timeout = setInterval(function() {
            var currentTime = new Date().getTime();
            if ((currentTime - lastTimeMouseMoved) > 1000) {
                $('button[role="playCenter"], #movie_stream').css('cursor', 'none');
                $('#movie_stream, #video_controls').mouseleave();
                clearTimeout(timeout);
            }
        }, 1000);
    });
}

// Enter full screen
function fullScreen()
{
    // check if user allows full screen of elements. This can be enabled or disabled in browser config. By default its enabled.
    //its also used to check if browser supports full screen api.
    if("fullscreenEnabled" in document || "webkitFullscreenEnabled" in document || "mozFullScreenEnabled" in document || "msFullscreenEnabled" in document)
    {
        if(document.fullscreenEnabled || document.webkitFullscreenEnabled || document.mozFullScreenEnabled || document.msFullscreenEnabled)
        {
            $('button[data-qa-id="fullscreenButton"] i').get(0).setAttribute('class', 'plex-icon-player-windowed-560');
            var element = document.getElementById('divVideo');
            //requestFullscreen is used to display an element in full screen mode.
            if("requestFullscreen" in element)
            {
                element.requestFullscreen();
            }
            else if ("webkitRequestFullscreen" in element)
            {
                element.webkitRequestFullscreen();
            }
            else if ("mozRequestFullScreen" in element)
            {
                element.mozRequestFullScreen();
            }
            else if ("msRequestFullscreen" in element)
            {
                element.msRequestFullscreen();
            }

        }
    }
    else
    {
        console.log("User doesn't allow full screen");
    }
}
// Exit full screen
function exitFullScreen() {
    $('button[data-qa-id="fullscreenButton"] i').get(0).setAttribute('class', 'plex-icon-player-fullscreen-560');
    if ("exitFullscreen" in document)
    {
        document.exitFullscreen();
    }
    else if ("webkitExitFullscreen" in document)
    {
        document.webkitExitFullscreen();
    }
    else if ("mozCancelFullScreen" in document)
    {
        document.mozCancelFullScreen();
    }
    else if ("msExitFullscreen" in document)
    {
        document.msExitFullscreen();
    }
}

// Initialise Sliders on the page
function initSliders () {

    var slider1 = new Slider($('.Slider-thumbTrack-21hGV .Slider-thumb-2QGiU').get(0));
    slider1.clickElementBefore = $('.SeekBar-seekBarTrack-3Gu5R').get(0);
    slider1.init();

    var slider2 = new Slider($('.VolumeSlider-slider-1QXdT .Slider-thumb-2QGiU').get(0));
    slider2.clickElementBefore = $('.VolumeSlider-fill-3XkYy').get(0);
    slider2.clickElementAfter = $('.VolumeSlider-track-2WJDz').get(0);
    slider2.init();

};

var Slider = function (domNode)  {

    this.domNode = domNode;
    this.railDomNode = domNode.parentNode;

    this.clickElementBefore = domNode.parentNode;
    this.clickElementAfter = domNode.parentNode;

    this.valueMin = 0;
    this.valueMax = 100;
    this.valueNow = 50;

    this.railWidth = 0;

    this.keyCode = Object.freeze({
        'left': 37,
        'up': 38,
        'right': 39,
        'down': 40,
        'pageUp': 33,
        'pageDown': 34,
        'end': 35,
        'home': 36
    });
};

// Initialize slider
Slider.prototype.init = function () {

    if (this.domNode.getAttribute('aria-valuemin')) {
        this.valueMin = parseInt((this.domNode.getAttribute('aria-valuemin')));
    }
    if (this.domNode.getAttribute('aria-valuemax')) {
        this.valueMax = parseInt((this.domNode.getAttribute('aria-valuemax')));
    }
    if (this.domNode.getAttribute('aria-valuenow')) {
        this.valueNow = parseInt((this.domNode.getAttribute('aria-valuenow')));
    }

    this.railWidth = parseInt(this.railDomNode.offsetWidth || !window.getComputedStyle(this.railDomNode.parentElement).width.match(/%/) ? window.getComputedStyle(this.railDomNode.parentElement).width : null || document.body.clientWidth);
    //this.railWidth = parseInt(this.railDomNode.offsetWidth || document.body.clientWidth);


    if (this.domNode.tabIndex != 0) {
        this.domNode.tabIndex = 0;
    }

    document.addEventListener('keydown',    this.handleKeyDown.bind(this));
    // add onmousedown, move, and onmouseup
    this.domNode.addEventListener('mousedown', this.handleMouseDown.bind(this));

    this.clickElementBefore.addEventListener('click', this.handleClick.bind(this));
    this.clickElementAfter.addEventListener('click', this.handleClick.bind(this));

    this.moveSliderTo(this.valueNow);
};

Slider.prototype.moveSliderTo = function (value) {

    if (value > this.valueMax) {
        value = this.valueMax;
    }

    if (value < this.valueMin) {
        value = this.valueMin;
    }

    this.valueNow = value;

    this.domNode.setAttribute('aria-valuenow', this.valueNow);

    var percent = (this.valueNow * 100) / this.valueMax;

    this.railDomNode.style.transform = 'translateX(-' + (100 - percent) + '%)';

    if(this.domNode.id === 'buttonTrack') {
        document.getElementsByClassName('SeekBar-seekBarFill-1Lcu0')[0].style.transform = 'scaleX(' + percent / 100 + ')';
        if(player && player.isPlaying()) {
            player.seekPercentage(percent);
        }
    }
    else if(this.domNode.id === 'buttonVolume') {
        document.getElementsByClassName('VolumeSlider-fill-3XkYy')[0].style.transform = 'scaleX(' + percent / 100 + ')';
        if(player) {
            player.setVolume(percent);
        }
    }

};

Slider.prototype.handleKeyDown = function (event) {

    var flag = false;

    switch (event.keyCode) {
        case this.keyCode.left:
        case this.keyCode.down:
            this.moveSliderTo(this.valueNow - 1);
            flag = true;
            break;

        case this.keyCode.right:
        case this.keyCode.up:
            this.moveSliderTo(this.valueNow + 1);
            flag = true;
            break;

        case this.keyCode.pageDown:
            this.moveSliderTo(this.valueNow - 10);
            flag = true;
            break;

        case this.keyCode.pageUp:
            this.moveSliderTo(this.valueNow + 10);
            flag = true;
            break;

        case this.keyCode.home:
            this.moveSliderTo(this.valueMin);
            flag = true;
            break;

        case this.keyCode.end:
            this.moveSliderTo(this.valueMax);
            flag = true;
            break;

        default:
            break;
    }

    if (flag) {
        event.preventDefault();
        event.stopPropagation();
    }

};

Slider.prototype.handleMouseDown = function (event) {

    var self = this;

    var handleMouseMove = function (event) {

        var diffX = event.pageX - (self.railDomNode.offsetLeft ? self.railDomNode.offsetLeft : self.railDomNode.parentElement.offsetLeft);
        self.valueNow = parseInt(((self.valueMax - self.valueMin) * diffX) / self.railWidth);
        self.moveSliderTo(self.valueNow);

        event.preventDefault();
        event.stopPropagation();
    };

    var handleMouseUp = function (event) {

        document.removeEventListener('mousemove', handleMouseMove);
        document.removeEventListener('mouseup', handleMouseUp);

    };

    // bind a mousemove event handler to move pointer
    document.addEventListener('mousemove', handleMouseMove);

    // bind a mouseup event handler to stop tracking mouse movements
    document.addEventListener('mouseup', handleMouseUp);

    event.preventDefault();
    event.stopPropagation();

};

// handleMouseMove has the same functionality as we need for handleMouseClick on the rail
Slider.prototype.handleClick = function (event) {

    var diffX = event.pageX - this.railDomNode.offsetLeft;
    this.valueNow = parseInt(((this.valueMax - this.valueMin) * diffX) / this.railWidth);
    this.moveSliderTo(this.valueNow);

};