<div class="PageHeader-pageHeader-18RSw">
    <div class="PageHeaderLeft-pageHeaderLeft-2TxSo"><span><?php echo __('discover'); ?><span
                    class="PageHeaderSeparator-pageHeaderSeparator-221fi DashSeparator-separator-2a3yn">—</span></span>
        <button aria-haspopup="true" data-qa-id="directoriesMenuButton" id="id-1976" role="button"
                class="PageHeaderBreadcrumbButton-button-1uaPj DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37 DisclosureArrowButton-isSelected-oswRN Link-link-2XYrU Link-default-32xSO  Link-isSelected-3GpAs"
                type="button"><?php echo __('all_libraries'); ?>
            <div class="DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd DisclosureArrow-isSelected-VMAVr"></div>
        </button>
    </div>
</div>
<div class="PageContent-pageContent-16mK6 Scroller-scroller-d5-b- Scroller-vertical-1bgGS ">
    <div class="DashboardPage-dashboardPageContent-2rN8X PageContent-innerPageContent-3ktLT">
        <div style="opacity: 1; pointer-events: auto;">
            <?php
            if ($watching_movies) : ?>
            <div class="HubCell-hubCell-3Ys17" style="visibility: visible;" data-qa-id="hub--home.continue">
                <div class="HubCellHeader-hubCellHeader-2pvYN HubCellHeader-hubCellHeader-2pvYN">
                    <div class="MetadataHubCellHeader-title-3ngFlY HubCellTitle-hubCellTitle-2abIn"
                         data-qa-id="hubCellTitle"><?php echo strtoupper(__('continue_to_watch')); ?><span
                                class="MetadataHubCellHeader-titleSeparator-2XLwHj DashSeparator-separator-2a3yn">—</span><span
                                class="MetadataHubCellHeader-sourceTitle-VjjOkx">Hack-Free</span></div>
                </div>
                <div style="height: 233px; overflow: hidden;">
                    <div class="Measure-container-2XznZ">
                        <div class="HubCell-hubScroller-2qgkrG VirtualListScroller-scroller-37EU_ Scroller-scroller-d5-b- Scroller-horizontal-1k8ET  ">
                            <div class=" " style="width: auto; height: 233px;">
                                <?php
                                $translate = -292;
                                foreach ($watching_movies as $watching_movie) :
                                ?>
                                <div style="position: absolute; width: 282px; height: 218px; transform: translate3d(<?php echo $translate += 294; ?>px, 10px, 0px); z-index: 0; transition: none 0s ease 0s;"
                                     data-qa-id="cellItem">
                                    <div class="MetadataPosterCard-cardContainer-2gRcQ">
                                        <div class="MetadataPosterCard-card-3bztR" style="width: 282px; height: 159px;">
                                            <div class="MetadataPosterCardFace-face--dz_D MetadataPosterCardFace-poster-L2P6r MetadataPosterCardFace-faceFront-1bxHG">
                                                <i class="plex-icon-shows-560  MetadataPosterCardIcon-placeholderIcon-2P76z" aria-hidden="true" style="font-size: 32px; line-height: 159px;"></i>
                                                <div class="PosterCardImg-imageContainer-1Ar4M"
                                                     data-watching-movie-id="<?php echo $watching_movie->movie_id; ?>" data-art="true">
                                                    <div style="background-image: url(); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                                                         class=""></div>
                                                </div>
                                                <div class=" MetadataPosterCardOverlay-overlay-1uMpL         ">
                                                    <div class="MetadataPosterCardOverlay-background-2EwyB"></div>
                                                    <?php if ($watching_movie->getMovie()->type === 'movie') : ?>
                                                        <a href="/movie/<?php echo $watching_movie->movie_id; ?>"
                                                    <?php else: ?>
                                                        <a href="/episode/<?php echo $watching_movie->movie_id; ?>"
                                                    <?php endif; ?>
                                                       role="link"
                                                       class="MetadataPosterCardOverlay-link-1Swhl Link-link-2XYrU Link-default-32xSO">
                                                    </a>
                                                        <button data-id=""
                                                                tabindex="-1"
                                                                role="button"
                                                                class="MetadataPosterCardOverlay-playButton-1fjhk PlayButton-playButton-3WX8X MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO"
                                                                type="button">
                                                            <div class="MetadataPosterCardOverlay-playCircle-M67q6 PlayButton-playCircle-3Evfd MetadataPosterCardOverlay-centerCircle-1Mg-s">
                                                                <i class="plex-icon-play-560 PlayButton-playIcon-dt3sk"
                                                                   aria-hidden="true"></i></div>
                                                        </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-qa-id="metadataTitleContainer"
                                         class="MetadataPosterCell-continueWatchingTitleContainer-3yCAY">
                                        <div class="MetadataPosterCell-splitTitleContainer-RAVdFk">
                                            <?php if($watching_movie->getMovie()->type === 'movie')
                                                $title = $watching_movie->getMovie()->title;
                                            else
                                                $title = $watching_movie->getMovie()->getTvShow()->title
                                            ?>
                                            <a title="<?php echo $title; ?>" href="#" role="link" class="MetadataPosterTitle-singleLineTitle-24_DNu MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSplitLeft-1zfWS Link-link-2XYrU Link-default-32xSO">
                                                <?php echo $title; ?>
                                            </a><span class="MetadataPosterTitle-singleLineTitle-24_DNu MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY MetadataPosterTitle-isSplitRight-lf6Nx">
                                                <?php echo (int)(($watching_movie->ended_time - $watching_movie->watching_time) / 60); ?> min restantes
                                            </span>
                                        </div>
                                        <span class="MetadataPosterTitle-singleLineTitle-24_DNu MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY">
                                             <?php if ($watching_movie->getMovie()->type === 'movie') : ?>
                                                 <span>
                                                    <a title="<?php echo $watching_movie->getMovie()->year; ?>" href="#" role="link"
                                                       class="Link-link-2n0yJn Link-default-2XA2bN"><?php echo $watching_movie->getMovie()->year; ?></a>
                                                </span>
                                             <?php else: ?>
                                             <span>
                                                <a title="Saison 1" href="/season/<?php echo $watching_movie->getMovie()->getSeason()->id; ?>" role="link" class="Link-link-2XYrU Link-default-32xSO">
                                                    S<?php echo $watching_movie->getMovie()->getSeason()->number; ?>
                                                </a>
                                                <span class="DashSeparator-separator-4CyEFW">·</span>
                                                 <a title="<?php echo $watching_movie->getMovie()->title; ?>" href="/episode/<?php echo $watching_movie->getMovie()->id; ?>" role="link" class="Link-link-2XYrU Link-default-32xSO">
                                                     E<?php echo $watching_movie->getMovie()->number; ?>
                                                 </a>
                                            </span>
                                             <span class="DashSeparator-separator-4CyEFW">—</span>
                                             <a title="<?php echo $watching_movie->getMovie()->title; ?>" href="/episode/<?php echo $watching_movie->getMovie()->id; ?>" role="link" class="Link-link-2XYrU Link-default-32xSO">
                                                 <?php echo $watching_movie->getMovie()->title; ?>
                                             </a>
                                             <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="Measure-scrollContainer-1c6dyV">
                            <div class="Measure-expandContent-zsLw6n"></div>
                        </div>
                        <div class="Measure-scrollContainer-1c6dyV">
                            <div class="Measure-shrinkContent-303GSV Measure-expandContent-zsLw6n"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="HubCell-hubCell-3Ys17" data-qa-id="tv_show"
                 style="visibility: visible;">
                <div class="HubCellHeader-hubCellHeader-2pvYN">
                    <div class="HubCellTitle-hubCellTitle-2abIn">
                        <a href="#" role="link" class="Link-link-2XYrU Link-default-32xSO"><?php echo strtoupper(__('recently.tv_shows')); ?></a>
                        <span class="PrePlayStatusButton-statusButton-28XJ7 Button-button--JvPI Button-small-3Zwli"><?php echo $episodes !== null ? count($episodes) : 0; ?></span>
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
                            <div class=" " style="width: auto; height: 275px;">
                                <?php if ($episodes) : ?>
                                    <?php
                                    $translate = -150;
                                    foreach ($episodes as $episode) :
                                        if(!isset($episode->id))
                                            continue;
                                    ?>
                                        <div class=" virtualized-cell-3KPHx "
                                             style="position: absolute; width: 127px; height: 260px; transform: translate3d(<?php echo $translate += 152; ?>px, 10px, 0px);">
                                            <div class="MetadataPosterCard-cardContainer-2gRcQ">
                                                <div class="MetadataPosterCard-card-3bztR "
                                                     style="width: 127px; height: 191px;">
                                                    <div class="MetadataPosterCardFace-face--dz_D MetadataPosterCardFace-poster-L2P6r MetadataPosterCardFace-faceFront-1bxHG  ">
                                                        <i class="plex-icon-shows-560  MetadataPosterCardIcon-placeholderIcon-2P76z" aria-hidden="true" style="font-size: 32px; line-height: 191px;"></i>
                                                        <div class="PosterCardImg-imageContainer-1Ar4M"
                                                             data-<?php echo ($episode instanceof Model_Movie) ? 'movie' : 'season'; ?>-id="<?php echo $episode->id; ?>">
                                                            <div style="background-image: url(); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                                                                 class=""></div>
                                                        </div>
                                                        <div class=" MetadataPosterCardOverlay-overlay-1uMpL         ">
                                                            <div class="MetadataPosterCardOverlay-background-2EwyB"></div>
                                                            <div class="MetadataPosterCardOverlay-unwatchedTagContainer-1lcEn">
                                                                <?php if ($episode instanceof Model_Season) : ?>
                                                                    <div class="MetadataPosterCardOverlay-unwatchedBadge-Qn1fv MetadataPosterCardOverlay-badge-1FU-p"><?php echo $episode->leafCount; ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php if ($episode instanceof Model_Season) : ?>
                                                                <a href="/season/<?php echo $episode->id; ?>"
                                                            <?php else: ?>
                                                                <a href="/episode/<?php echo $episode->id; ?>"
                                                            <?php endif; ?>
                                                               role="link"
                                                               class="MetadataPosterCardOverlay-link-1Swhl Link-link-2XYrU Link-default-32xSO">
                                                                </a>
                                                            <?php if ($episode instanceof Model_Movie) : ?>
                                                            <button data-id="<?php echo ($episode instanceof Model_Movie) ? $episode->id : ''; ?>"
                                                                    tabindex="-1"
                                                                    role="button"
                                                                    class="MetadataPosterCardOverlay-playButton-1fjhk PlayButton-playButton-3WX8X MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO"
                                                                    type="button">
                                                                <div class="MetadataPosterCardOverlay-playCircle-M67q6 PlayButton-playCircle-3Evfd MetadataPosterCardOverlay-centerCircle-1Mg-s">
                                                                    <i class="plex-icon-play-560 PlayButton-playIcon-dt3sk"
                                                                       aria-hidden="true"></i></div>
                                                            </button>
                                                            <?php endif; ?>
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
                                                <?php if ($episode instanceof Model_Movie) : ?>
                                                    <a title="<?php echo $episode->title; ?>"
                                                       href="/episode/<?php echo $episode->id; ?>"
                                                       role="link"
                                                       class="MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY Link-link-2XYrU Link-default-32xSO">
                                                        <?php echo $episode->title; ?>
                                                    </a>
                                                <?php endif; ?>
                                                <span class=" MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY  ">
                                                <a title="<?php echo ($episode instanceof Model_Movie) ? $episode->getSeason()->title : $episode->title; ?>"
                                                   href="/season/<?php echo ($episode instanceof Model_Movie) ? $episode->getSeason()->id : $episode->id; ?>"
                                                   role="link"
                                                   class=" Link-link-2XYrU Link-default-32xSO">
                                                    <?php echo ($episode instanceof Model_Movie) ? 'S' : __('season'); ?>
                                                    <?php echo ($episode instanceof Model_Movie) ? $episode->getSeason()->number : $episode->number; ?>
                                                </a>
                                                    <?php if ($episode instanceof Model_Movie) : ?>
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
                        <span class="PrePlayStatusButton-statusButton-28XJ7 Button-button--JvPI Button-small-3Zwli"><?php echo $movies !== null ? count($movies) : 0; ?></span>
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
                                        if(!isset($movie->id))
                                            continue;
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
        $('.PosterCardImg-imageContainer-1Ar4M[data-watching-movie-id], .PosterCardImg-imageContainer-1Ar4M[data-movie-id], .PosterCardImg-imageContainer-1Ar4M[data-season-id]').each(function (index, element) {
            let watching_movie_id = $(element).data('watching-movie-id');
            watching_movie_id ? $('[data-watching-movie-id="' + watching_movie_id + '"] > div').css('background-image', 'url("/cover/movie?movie_id=' + watching_movie_id + '&width=' + 375 + '&height=' + 211 + '&art=true")') : null;

            let movie_id = $(element).data('movie-id');
            movie_id ? $('[data-movie-id="' + movie_id + '"] > div').css('background-image', 'url("/cover/movie?movie_id=' + movie_id + '&width=' + 175 + '&height=' + 263 + '")') : null;

            let season_id = $(element).data('season-id');
            season_id ? $('[data-season-id="' + season_id + '"] > div').css('background-image', 'url("/cover/season?season_id='+ season_id +'&width=' + 175 + '&height=' + 263 + '")') : null;
        });
        /** SCROLL LIST TV SHOWS AND MOVIES **/
        $('.HubCell-hubActions-28w1- button').on('click', function () {
            var parent = $(this).closest('div[data-qa-id]');
            var select = $(parent).data('qa-id');
            var previous = $(parent).find('button[data-hubcell-action="previous"]');
            var next = $(parent).find('button[data-hubcell-action="next"]');
            var list = $('#' + select + '_list');
            console.log(list.scrollLeft(), list.width());

            if ($(this).data('hubcell-action') === 'previous') {
                list.animate({scrollLeft: list.scrollLeft() - list.width()}, 200);
                setTimeout(function () {
                    if (list.scrollLeft() <= (150 * 19)) {
                        $(next).removeClass('isDisabled');
                    }

                    if (list.scrollLeft() === 0) {
                        $(previous).addClass('isDisabled');
                    }
                }, 100);
            }
            if ($(this).data('hubcell-action') === 'next') {
                list.animate({scrollLeft: list.scrollLeft() + list.width()}, 300);
                setTimeout(function () {
                    if (list.scrollLeft() > 0) {
                        $(previous).removeClass('isDisabled');
                    }

                    if (list.scrollLeft() >= (150 * 19)) {
                        $(next).addClass('isDisabled');
                    }

                    if (list.scrollLeft() === 0) {
                        $(next).addClass('isDisabled');
                    }
                }, 100);
            }
        });
    });
</script>