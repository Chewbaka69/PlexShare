<div class="PageContent-pageContent-16mK6 Scroller-scroller-d5-b- Scroller-vertical-1bgGS ">
    <div class="DashboardPage-dashboardPageContent-2rN8X PageContent-innerPageContent-3ktLT">
        <div style="opacity: 1; pointer-events: auto;">
            <div class="HubCell-hubCell-3Ys17" data-qa-id="tv_show"
                 style="visibility: visible;">
                <div class="HubCellHeader-hubCellHeader-2pvYN">
                    <div class="HubCellTitle-hubCellTitle-2abIn"><a
                                href="#" role="link" class="Link-link-2XYrU Link-default-32xSO">RECENTLY ADDED TV</a></div>
                    <div class="HubCell-hubActions-28w1- tv-shows-hubcell">
                        <button role="button" data-hubcell-action="previous"
                                class="HubCell-hubScrollButton-2Y7ri Link-link-2XYrU Link-default-32xSO isDisabled"
                                type="button">
                            <i class="plex-icon-hub-prev-560"></i>
                        </button>
                        <button role="button" data-hubcell-action="next"
                                class="HubCell-hubScrollButton-2Y7ri Link-link-2XYrU Link-default-32xSO"
                                type="button">
                            <i class="plex-icon-hub-next-560"></i>
                        </button>
                    </div>
                </div>
                <div style="height: 275px; overflow: hidden;">
                    <div class="Measure-container-2XznZ">
                        <div id="tv_show_list" class="VirtualListScroller-scroller-37EU_ Scroller-scroller-d5-b- Scroller-horizontal-1k8ET ">
                            <div class=" " style="width: 4540px; height: 275px;">
                                <?php if($episodes) : ?>
                                <?php
                                $translate = -150;
                                foreach ($episodes as $episode) :
                                    ?>
                                    <div class=" virtualized-cell-3KPHx "
                                         style="position: absolute; width: 127px; height: 260px; transform: translate3d(<?php echo $translate += 152; ?>px, 10px, 0px);">
                                        <div class="MetadataPosterCard-cardContainer-2gRcQ">
                                            <div class="MetadataPosterCard-card-3bztR "
                                                 style="width: 127px; height: 191px;">
                                                <div class="MetadataPosterCardFace-face--dz_D MetadataPosterCardFace-poster-L2P6r MetadataPosterCardFace-faceFront-1bxHG  ">
                                                    <div class="PosterCardImg-imageContainer-1Ar4M" data-movie-id="<?php echo $episode->id; ?>">
                                                        <div style="background-image: url(data:image/jpeg;base64,<?php //echo $episode->getCover(); ?>); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                                                             class=""></div>
                                                    </div>
                                                    <div class=" MetadataPosterCardOverlay-overlay-1uMpL         ">
                                                        <div class="MetadataPosterCardOverlay-background-2EwyB"></div>
                                                        <div class="MetadataPosterCardOverlay-unwatchedTagContainer-1lcEn">
                                                            <div class="MetadataPosterCardOverlay-unwatchedTag-Fqazx MetadataPosterCardOverlay-unwatchedBadge-Qn1fv MetadataPosterCardOverlay-badge-1FU-p"></div>
                                                        </div>
                                                        <a href="/movie/<?php echo $episode->id; ?>"
                                                           role="link"
                                                           class="MetadataPosterCardOverlay-link-1Swhl Link-link-2XYrU Link-default-32xSO"></a>
                                                        <button data-id="<?php echo $episode->id; ?>"
                                                                tabindex="-1"
                                                                role="button"
                                                                class="MetadataPosterCardOverlay-playButton-1fjhk PlayButton-playButton-3WX8X MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO"
                                                                type="button">
                                                            <div class="MetadataPosterCardOverlay-playCircle-M67q6 PlayButton-playCircle-3Evfd MetadataPosterCardOverlay-centerCircle-1Mg-s">
                                                                <i class="plex-icon-play-560 PlayButton-playIcon-dt3sk"
                                                                   aria-hidden="true"></i></div>
                                                        </button>
                                                        <button id="id-3281" tabindex="-1"
                                                                aria-label="More Actions"
                                                                aria-haspopup="true"
                                                                data-qa-id="metadataPosterMoreButton"
                                                                role="button"
                                                                class="MetadataPosterCardOverlay-moreButton-3FK-K MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO"
                                                                type="button">
                                                            <i class="plex-icon-more-560"
                                                               aria-hidden="true"></i>
                                                        </button>
                                                        <button aria-label="Select 1-800-799-7233"
                                                                id="id-3282" tabindex="-1" role="button"
                                                                class="MetadataPosterCardOverlay-selectButton-3rwSV SelectButton-selectButton-3Kbjm MetadataPosterCardOverlay-button-M43H-  Link-link-2XYrU Link-default-32xSO      "
                                                                type="button">
                                                            <div class="MetadataPosterCardOverlay-selectCircle-3ql8S SelectButton-selectCircle-3tdvG">
                                                                <i class="plex-icon-selected-560 SelectButton-selectedIcon-3-SAL"
                                                                   aria-hidden="true"></i></div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="MetadataPosterCell-titleContainer-24DI6">
                                            <a title="<?php echo $episode->getTvShow()->title; ?>"
                                               href="/tvshow/<?php echo $episode->getTvShow()->id; ?>"
                                               role="link"
                                               class=" MetadataPosterTitle-title-3tU5F Link-link-2XYrU Link-default-32xSO">
                                                <?php echo $episode->getTvShow()->title; ?>
                                            </a>
                                            <a title="<?php echo $episode->title; ?>"
                                               href="/movie/<?php echo $episode->id; ?>"
                                               role="link"
                                               class="MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY Link-link-2XYrU Link-default-32xSO">
                                                <?php echo $episode->title; ?>
                                            </a>
                                            <span class=" MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY  "><a
                                                        title="<?php echo $episode->getSeason()->title; ?>"
                                                        href="/season/<?php echo $episode->getSeason()->id; ?>"
                                                        role="link"
                                                        class=" Link-link-2XYrU Link-default-32xSO">S<?php echo $episode->getSeason()->number; ?></a><span
                                                        class="DashSeparator-separator-2a3yn">·</span><a
                                                        title="<?php echo $episode->title; ?>"
                                                        href="/movie/<?php echo $episode->id; ?>"
                                                        role="link"
                                                        class=" Link-link-2XYrU Link-default-32xSO">E<?php echo $episode->number; ?></a></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="Measure-scrollContainer-3vb4J">
                            <div class="Measure-expandContent-1JQfL"></div>
                        </div>
                        <div class="Measure-scrollContainer-3vb4J">
                            <div class="Measure-shrinkContent-32Udi Measure-expandContent-1JQfL"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="HubCell-hubCell-3Ys17" data-qa-id="movies"
                 style="visibility: visible;">
                <div class="HubCellHeader-hubCellHeader-2pvYN">
                    <div class="HubCellTitle-hubCellTitle-2abIn"><a
                                href="#"
                                role="link" class="Link-link-2XYrU Link-default-32xSO">RECENTLY ADDED MOVIES</a></div>
                    <div class="HubCell-hubActions-28w1- movies-hubcell">
                        <button role="button" data-hubcell-action="previous"
                                class="HubCell-hubScrollButton-2Y7ri Link-link-2XYrU Link-default-32xSO isDisabled"
                                type="button">
                            <i class="plex-icon-hub-prev-560"></i>
                        </button>
                        <button role="button" data-hubcell-action="next"
                                class="HubCell-hubScrollButton-2Y7ri Link-link-2XYrU Link-default-32xSO"
                                type="button">
                            <i class="plex-icon-hub-next-560"></i>
                    </div>
                </div>
                <div style="height: 255px; overflow: hidden;">
                    <div class="Measure-container-2XznZ">
                        <div id="movies_list" class="VirtualListScroller-scroller-37EU_ Scroller-scroller-d5-b- Scroller-horizontal-1k8ET ">
                            <div class=" " style="width: 4540px; height: 255px;">
                                <?php if($movies) : ?>
                                <?php
                                $translate = -150;
                                foreach ($movies as $movie) :
                                    ?>
                                    <div class=" virtualized-cell-3KPHx "
                                         style="position: absolute; width: 127px; height: 240px; transform: translate3d(<?php echo $translate += 152; ?>px, 10px, 0px);">
                                        <div class="MetadataPosterCard-cardContainer-2gRcQ">
                                            <div class="MetadataPosterCard-card-3bztR "
                                                 style="width: 127px; height: 191px;">
                                                <div class="MetadataPosterCardFace-face--dz_D MetadataPosterCardFace-poster-L2P6r MetadataPosterCardFace-faceFront-1bxHG  ">
                                                    <div class="PosterCardImg-imageContainer-1Ar4M" data-movie-id="<?php echo $movie->id; ?>">
                                                        <div style="background-image: url(); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                                                             class=""></div>
                                                    </div>
                                                    <div class=" MetadataPosterCardOverlay-overlay-1uMpL         ">
                                                        <div class="MetadataPosterCardOverlay-background-2EwyB"></div>
                                                        <div class="MetadataPosterCardOverlay-unwatchedTagContainer-1lcEn">
                                                            <div class="MetadataPosterCardOverlay-unwatchedTag-Fqazx MetadataPosterCardOverlay-unwatchedBadge-Qn1fv MetadataPosterCardOverlay-badge-1FU-p"></div>
                                                        </div>
                                                        <a href="/movie/<?php echo $movie->id; ?>"
                                                           role="link"
                                                           class="MetadataPosterCardOverlay-link-1Swhl Link-link-2XYrU Link-default-32xSO"></a>
                                                        <button data-id="<?php echo $movie->id; ?>"
                                                                tabindex="-1"
                                                                role="button"
                                                                class="MetadataPosterCardOverlay-playButton-1fjhk PlayButton-playButton-3WX8X MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO      "
                                                                type="button">
                                                            <div class="MetadataPosterCardOverlay-playCircle-M67q6 PlayButton-playCircle-3Evfd MetadataPosterCardOverlay-centerCircle-1Mg-s">
                                                                <i class="plex-icon-play-560 PlayButton-playIcon-dt3sk"
                                                                   aria-hidden="true"></i></div>
                                                        </button>
                                                        <button id="id-3044" tabindex="-1"
                                                                aria-label="More Actions"
                                                                aria-haspopup="true"
                                                                data-qa-id="metadataPosterMoreButton"
                                                                role="button"
                                                                class="MetadataPosterCardOverlay-moreButton-3FK-K MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO      "
                                                                type="button">
                                                            <i class="plex-icon-more-560"
                                                               aria-hidden="true"></i>
                                                        </button>
                                                        <button aria-label="Select Hercules"
                                                                id="id-3045" tabindex="-1" role="button"
                                                                class="MetadataPosterCardOverlay-selectButton-3rwSV SelectButton-selectButton-3Kbjm MetadataPosterCardOverlay-button-M43H-  Link-link-2XYrU Link-default-32xSO      "
                                                                type="button">
                                                            <div class="MetadataPosterCardOverlay-selectCircle-3ql8S SelectButton-selectCircle-3tdvG">
                                                                <i class="plex-icon-selected-560 SelectButton-selectedIcon-3-SAL"
                                                                   aria-hidden="true"></i></div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="MetadataPosterCell-titleContainer-24DI6">
                                            <a title="<?php echo $movie->title; ?>" href="/movie/<?php echo $movie->id; ?>" role="link"
                                               class="MetadataPosterTitle-title-3tU5F Link-link-2XYrU Link-default-32xSO"><?php echo $movie->title; ?>
                                            </a>
                                            <span class="MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY"><?php echo $movie->year; ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="Measure-scrollContainer-3vb4J">
                            <div class="Measure-expandContent-1JQfL"></div>
                        </div>
                        <div class="Measure-scrollContainer-3vb4J">
                            <div class="Measure-shrinkContent-32Udi Measure-expandContent-1JQfL"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function () {
    $(document).on('click', '.MetadataPosterCardOverlay-playButton-1fjhk.PlayButton-playButton-3WX8X', function (event) {
        event.stopPropagation();
        var movie_id = $(this).data('id');
        $.ajax({
            url: '/rest/movie/stream',
            method: 'GET',
            data: { movie_id : movie_id },
            dataType: 'html'
        }).done(function(view) {
            launchPlayer(view);
        }).fail(function(data) {
            console.error(data);
        });
    });
    $('.PosterCardImg-imageContainer-1Ar4M[data-movie-id]').each(function (index, element) {
        setTimeout(function () {
            var movie_id = $(element).data('movie-id');
            $('[data-movie-id="' + movie_id + '"] > div').css('background-image', 'url("/cover/movie?movie_id='+ movie_id +'&width='+ 126 +'&height='+189+'")');
        }, (index + 1) * 100);
    });
    $('.HubCell-hubActions-28w1- button').on('click', function(){
        var parent = $(this).closest('div[data-qa-id]');
        var select = $(parent).data('qa-id');
        var previous = $(parent).find('button[data-hubcell-action="previous"]');
        var next = $(parent).find('button[data-hubcell-action="next"]');

        if($(this).data('hubcell-action') === 'previous') {
            $('#' + select + '_list').animate({scrollLeft: $('#' + select + '_list').scrollLeft() - 152 * 2}, 500);
            setTimeout(function(){
                if($('#' + select + '_list').scrollLeft() <= (150 * 19)) {
                    $(next).removeClass('isDisabled');
                }

                if($('#' + select + '_list').scrollLeft() === 0) {
                    $(previous).addClass('isDisabled');
                }
            }, 500);
        }
        if($(this).data('hubcell-action') === 'next') {
            $('#' + select + '_list').animate({scrollLeft: $('#' + select + '_list').scrollLeft() + 152 * 2}, 500);
            setTimeout(function(){
                if($('#' + select + '_list').scrollLeft() > 0) {
                    $(previous).removeClass('isDisabled');
                }

                console.log($('#' + select + '_list').scrollLeft());

                if($('#' + select + '_list').scrollLeft() >= (150 * 19)) {
                    $(next).addClass('isDisabled');
                }
            }, 500);
        }
    });
});
</script>