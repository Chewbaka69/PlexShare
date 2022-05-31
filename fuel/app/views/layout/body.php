<body>
<div id="plex" class="application">
    <?php echo \View::forge('layout/nav_bar_header', ['user' => $user]); ?>
    <div class="background-container">
        <div data-reactroot="" class="FullPage-container-3qanw">
            <div>
                <div>
                    <div style="background-image: url('https://plex.hack-free.org/web/common/img/backgrounds/preset-light2.ead08af5122abea1ab8f7d601fd93d6a.png'); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                         class=""></div>
                </div>
                <div style="position: absolute; width: 100%; height: 100%; background: rgba(0, 0, 0, 0) url('//assets.plex.tv/deploys/desktop/env-eb2798cc3c7d9533df5b563963d5c394/3.34.1-b51c37a/common/img/backgrounds/noise.8b05ce45d0df59343e206bc9ae78d85d.png') repeat scroll 0% 0%; z-index: 2;"></div>
            </div>
        </div>
    </div>
    <div id="content" class="scroll-container dark-scrollbar">
        <div>
            <div data-reactroot="" class="FullPage-container-3qanw">
                <?php echo \View::forge('layout/nav_bar_vertical', ['MenuLibraries' => $MenuLibraries, 'MenuServer' => $MenuServer]); ?>
                <div class="Page-page-aq7i_ Scroller-scroller-d5-b- Scroller-none-1LyUO ">
                    <?php echo $body; ?>
                </div>
            </div>
        </div>
    </div>
    <div>
    </div>
</div>
<?php if($servers > 0) : ?>
<div class="Menu-menuPortal-2JtDz"
     style="position: absolute; transform: translate3d(5px, 120px, 0px); top: 0px; left: 0px; will-change: transform; display: none" x-placement="bottom-start">
    <div id="id-1">
        <div role="menu"
             class="ServerMenu-serverMenu-6KNnX MenuContainer-menu-3Gtlw MenuContainer-medium-2XOYJ">
            <div class="ServerMenu-serverMenuScroller-1nSX6 Menu-menuScroller-E0NwY Scroller-vertical-1bgGS Scroller-scroller-d5-b- Scroller-auto-3t4gM"
                 style="max-height: 300px;">
                <div>
                    <?php foreach ($servers as $_server) : ?>
                    <?php if($_server->id === $MenuServer->id) : ?>
                    <a role="menuitem" href="#"
                    <?php else: ?>
                    <a role="menuitem" href="/home/<?php echo $_server->id; ?>"
                    <?php endif; ?>
                            class="ServerMenuItem-serverMenuItem-2djO5 ServerMenuItem-selectedServerMenuItem-jaUTX MenuItem-menuItem-25266 MenuItem-default-tX5Cl Link-link-2XYrU Link-default-32xSO      ">
                        <div class="ServerMenuItem-serverMenuItemContainer-1DS9V">
                            <div class="ServerMenuItem-serverMenuTitle-1s5qR">
                                <div class="ServerMenuItem-serverMenuFriendlyName-37Gt7"><?php echo $_server->name; ?></div>
                                <div class="ServerMenuItem-serverMenuDetails-1-Rfq"></div>
                            </div>
                            <div class="ServerMenuItem-serverMenuIconContainer-2WtBG">
                                <?php if($_server->id === $MenuServer->id) : ?>
                                <i class="plex-icon-selected-560 ServerMenuItem-serverMenuIcon-2zKCW ServerMenuItem-selectedIcon-dhK05"
                                        aria-hidden="false" aria-label="Sélectionné(e)"></i>
                                <?php endif; ?>
                                <i class="plex-icon-lock-560 ServerMenuItem-serverMenuIcon-2zKCW ServerMenuIcon-secureIcon-Xrgxg"
                                        aria-hidden="false" aria-label="Sécurisé"></i>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div id="divVideo" style="display: none">
    <div id="movie_stream" style="height: 100%"></div>
    <div id="video_controls" class="AudioVideoPlayerView-container-kWiFs"></div>
</div>
<script type="text/javascript">
$(function() {
    $('[data-toggle="tooltip"]').tooltip({ container: 'body', template: '<div class="tooltip Tooltip-tooltipPortal-1IUlb"><div class="tooltip-arrow"></div><div class="tooltip-inner Tooltip-tooltip-2AL-W"></div></div>'});
    $(document).on('click', '#id-3026', function (event) {
        event.stopPropagation();
        $(this).find('.DisclosureArrow-disclosureArrow-1sBFv').toggleClass('DisclosureArrow-up-1U7WW DisclosureArrow-down-1U7WW');
        $('.Menu-menuPortal-2JtDz').toggle();
    });
    $(document).on('click', 'body', function (event) {
        event.stopPropagation();
        if($('.Menu-menuPortal-2JtDz').css('display') !== 'none')
            $('#id-3026').click();
    });
    $(document).on('focus focusout', '.QuickSearchInput-container-R2-wn', function (event) {
        event.stopPropagation();
        if(!$('.QuickSearchInput-container-R2-wn').hasClass('QuickSearchInput-focused-2kpW8'))
            $('.QuickSearchInput-container-R2-wn').addClass('QuickSearchInput-focused-2kpW8');
        else {
            $('.QuickSearchInput-container-R2-wn').removeClass('QuickSearchInput-focused-2kpW8');
        }
    });
    $('body').not('#search_result').on('click', function () {
        if(!$('#search_result').hasClass('hidden')) {
            $('#search_result').addClass('hidden');
            $('input.QuickSearchInput-searchInput-2HU6-').val('');
            $('._search').remove();
        }
    });
    $(document).on('keyup', '.QuickSearchInput-searchInput-2HU6-', function (event) {
        event.stopPropagation();
        if($(this).val().length < 2)
            return;

        $.ajax({
            url: '/rest/search/index',
            method: 'GET',
            data: {search: $(this).val()},
            dataType: 'json'
        }).done(function (data) {
            $('._search').remove();

            if(data.movies.length === 0 && data.episodes.length === 0)
                return;

            $('#search_result').removeClass('hidden');

            data.movies.forEach(function (movie, index) {
                let template = $('#film_template').clone();

                template.removeClass('hidden');
                template.addClass('_search');
                template.html(template.html().replace(/{\$TITLE\$}/g, movie.title));
                template.html(template.html().replace(/{\$YEAR\$}/g, movie.year));
                template.html(template.html().replace(/{\$MOVIEID\$}/g, movie.id));

                $('#film_template').after(template);
            });

            data.episodes.forEach(function (episode, index) {
                let template = $('#episode_template').clone();

                template.removeClass('hidden');
                template.addClass('_search');
                template.html(template.html().replace(/{\$TITLE\$}/g, episode.title));
                template.html(template.html().replace(/{\$YEAR\$}/g, episode.year));
                template.html(template.html().replace(/{\$MOVIEID\$}/g, episode.id));

                $('#episode_template').after(template);
            });
        }).fail(function (data) {
            console.error(data.responseText);
            show_alert('error', data.responseText);
        });
    });
});
</script>
<?php
    echo \Asset::js(['bootstrap.min.js']);
    echo \Asset::js(isset($js_bottom) ? $js_bottom : null);
?>
<devBy class="hidden">Created By Chewbaka69 // https://github.com/Chewbaka69/PlexShare</devBy>
</body>