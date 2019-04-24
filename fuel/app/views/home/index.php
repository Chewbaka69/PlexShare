<div class="PageHeader-pageHeader-18RSw">
    <div class="PageHeaderLeft-pageHeaderLeft-2TxSo"><span>Découvrir<span
                    class="PageHeaderSeparator-pageHeaderSeparator-221fi DashSeparator-separator-2a3yn">—</span></span>
        <button aria-haspopup="true" data-qa-id="directoriesMenuButton" id="id-1976" role="button"
                class="PageHeaderBreadcrumbButton-button-1uaPj DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37 DisclosureArrowButton-isSelected-oswRN Link-link-2XYrU Link-default-32xSO  Link-isSelected-3GpAs"
                type="button">Toutes les bibliothèques
            <div class="DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd DisclosureArrow-isSelected-VMAVr"></div>
        </button>
    </div>
</div>
<div class="PageContent-pageContent-16mK6 Scroller-scroller-d5-b- Scroller-vertical-1bgGS ">
    <div class="DashboardPage-dashboardPageContent-2rN8X PageContent-innerPageContent-3ktLT">
        <div style="opacity: 1; pointer-events: auto;">
            <div class="HubCell-hubCell-3Ys17" data-qa-id="tv_show"
                 style="visibility: visible;">
                <div class="HubCellHeader-hubCellHeader-2pvYN">
                    <div class="HubCellTitle-hubCellTitle-2abIn">
                        <a href="#" role="link" class="Link-link-2XYrU Link-default-32xSO"><?php echo strtoupper(__('recently.tv_shows')); ?></a>
                        <span class="PrePlayStatusButton-statusButton-28XJ7 Button-button--JvPI Button-small-3Zwli"><?php echo count($episodes); ?></span>
                    </div>
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
                        <div id="tv_show_list"
                             class="VirtualListScroller-scroller-37EU_ Scroller-scroller-d5-b- Scroller-horizontal-1k8ET ">
                            <div class=" " style="width: 4540px; height: 275px;">
                                <?php if ($episodes) : ?>
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
                                                        <i class="plex-icon-shows-560  MetadataPosterCardIcon-placeholderIcon-2P76z" aria-hidden="true" style="font-size: 32px; line-height: 191px;"></i>
                                                        <div class="PosterCardImg-imageContainer-1Ar4M"
                                                             data-movie-id="<?php echo $episode->id; ?>">
                                                            <div style="background-image: url(); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                                                                 class=""></div>
                                                        </div>
                                                        <div class=" MetadataPosterCardOverlay-overlay-1uMpL         ">
                                                            <div class="MetadataPosterCardOverlay-background-2EwyB"></div>
                                                            <div class="MetadataPosterCardOverlay-unwatchedTagContainer-1lcEn">
                                                                <div class="MetadataPosterCardOverlay-unwatchedBadge-Qn1fv MetadataPosterCardOverlay-badge-1FU-p"><?php echo $episode->count > 1 ? $episode->count : ''; ?></div>
                                                            </div>
                                                            <?php if ($episode->count > 1) : ?>
                                                                <a href="/season/<?php echo $episode->getSeason()->id; ?>"
                                                            <?php else: ?>
                                                            <a href="/episode/<?php echo $episode->id; ?>"
                                                                <?php endif; ?>
                                                               role="link"
                                                               class="MetadataPosterCardOverlay-link-1Swhl Link-link-2XYrU Link-default-32xSO">
                                                                <button data-id="<?php echo $episode->count <= 1 ? $episode->id : ''; ?>"
                                                                        tabindex="-1"
                                                                        role="button"
                                                                        class="MetadataPosterCardOverlay-playButton-1fjhk PlayButton-playButton-3WX8X MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO"
                                                                        type="button">
                                                                    <div class="MetadataPosterCardOverlay-playCircle-M67q6 PlayButton-playCircle-3Evfd MetadataPosterCardOverlay-centerCircle-1Mg-s">
                                                                        <i class="plex-icon-play-560 PlayButton-playIcon-dt3sk"
                                                                           aria-hidden="true"></i></div>
                                                                </button>
                                                            </a>
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
                                                <?php if (1 == $episode->count) : ?>
                                                    <a title="<?php echo $episode->title; ?>"
                                                       href="/episode/<?php echo $episode->id; ?>"
                                                       role="link"
                                                       class="MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY Link-link-2XYrU Link-default-32xSO">
                                                        <?php echo $episode->title; ?>
                                                    </a>
                                                <?php endif; ?>
                                                <span class=" MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY  ">
                                                <a title="<?php echo $episode->getSeason()->title; ?>"
                                                   href="/season/<?php echo $episode->getSeason()->id; ?>"
                                                   role="link"
                                                   class=" Link-link-2XYrU Link-default-32xSO">
                                                    <?php echo 1 == $episode->count ? 'S' : __('season'); ?>
                                                    <?php echo $episode->getSeason()->number; ?>
                                                </a>
                                                    <?php if (1 == $episode->count) : ?>
                                                        <span class="DashSeparator-separator-2a3yn">·</span>
                                                        <a title="<?php echo $episode->title; ?>"
                                                           href="/episode/<?php echo $episode->id; ?>"
                                                           role="link"
                                                           class=" Link-link-2XYrU Link-default-32xSO">E<?php echo $episode->number; ?>
                                                </a>
                                                    <?php endif; ?>
                                            </span>
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
                    <div class="HubCellTitle-hubCellTitle-2abIn">
                        <a href="#" role="link" class="Link-link-2XYrU Link-default-32xSO"><?php echo strtoupper(__('recently.movies')); ?></a>
                        <span class="PrePlayStatusButton-statusButton-28XJ7 Button-button--JvPI Button-small-3Zwli"><?php echo count($movies); ?></span>
                    </div>
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
                        <div id="movies_list"
                             class="VirtualListScroller-scroller-37EU_ Scroller-scroller-d5-b- Scroller-horizontal-1k8ET ">
                            <div class=" " style="width: 4540px; height: 255px;">
                                <?php if ($movies) : ?>
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
                                                        <i class="plex-icon-shows-560  MetadataPosterCardIcon-placeholderIcon-2P76z" aria-hidden="true" style="font-size: 32px; line-height: 191px;"></i>
                                                        <div class="PosterCardImg-imageContainer-1Ar4M"
                                                             data-movie-id="<?php echo $movie->id; ?>">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="MetadataPosterCell-titleContainer-24DI6">
                                                <a title="<?php echo $movie->title; ?>"
                                                   href="/movie/<?php echo $movie->id; ?>" role="link"
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
    $(window).on('load', function () {
        /** LAUNCH PLAYER **/
        $(document).on('click', '.MetadataPosterCardOverlay-playButton-1fjhk.PlayButton-playButton-3WX8X', function (event) {
            var movie_id = $(this).data('id');
            if (movie_id === '')
                return;

            event.stopPropagation();

            $.ajax({
                url: '/rest/movie/stream',
                method: 'GET',
                data: {movie_id: movie_id},
                dataType: 'html'
            }).done(function (view) {
                launchPlayer(view);
            }).fail(function (data) {
                console.error(data.responseText);
                show_alert('error', data.responseText);
            });
        });
        /** LOADING PICTURE **/
        $('.PosterCardImg-imageContainer-1Ar4M[data-movie-id]').each(function (index, element) {
            var movie_id = $(element).data('movie-id');
            $('[data-movie-id="' + movie_id + '"] > div').css('background-image', 'url("/cover/movie?movie_id=' + movie_id + '&width=' + 158 + '&height=' + 233 + '")');
        });
        /** SCROLL LIST TV SHOWS AND MOVIES **/
        $('.HubCell-hubActions-28w1- button').on('click', function () {
            var parent = $(this).closest('div[data-qa-id]');
            var select = $(parent).data('qa-id');
            var previous = $(parent).find('button[data-hubcell-action="previous"]');
            var next = $(parent).find('button[data-hubcell-action="next"]');

            if ($(this).data('hubcell-action') === 'previous') {
                $('#' + select + '_list').animate({scrollLeft: $('#' + select + '_list').scrollLeft() - 152 * 2}, 200);
                setTimeout(function () {
                    if ($('#' + select + '_list').scrollLeft() <= (150 * 19)) {
                        $(next).removeClass('isDisabled');
                    }

                    if ($('#' + select + '_list').scrollLeft() === 0) {
                        $(previous).addClass('isDisabled');
                    }
                }, 200);
            }
            if ($(this).data('hubcell-action') === 'next') {
                $('#' + select + '_list').animate({scrollLeft: $('#' + select + '_list').scrollLeft() + 152 * 2}, 300);
                setTimeout(function () {
                    if ($('#' + select + '_list').scrollLeft() > 0) {
                        $(previous).removeClass('isDisabled');
                    }

                    if ($('#' + select + '_list').scrollLeft() >= (150 * 19)) {
                        $(next).addClass('isDisabled');
                    }

                    if ($('#' + select + '_list').scrollLeft() === 0) {
                        $(next).addClass('isDisabled');
                    }
                }, 300);
            }
        });
    });
</script>