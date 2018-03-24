<div class="PrePlayPageHeader-altPageHeader-3bZbS PrePlayPageHeader-pageHeader-2o14F PageHeader-pageHeader-18RSw">
    <div class="PageHeaderLeft-pageHeaderLeft-2TxSo"><span
                class="PageHeaderBreadcrumbButton-link-1N0DD"><?php echo $movie->title; ?></span>
    </div>
    <div class="PageHeaderRight-pageHeaderRight-2CT0g">
        <div class="pageHeaderToolbar-toolbarContainer-2N-IJ Measure-container-2XznZ">
            <div class="pageHeaderToolbar-toolbar-1lW-M">
                <button id="id-16" data-original-title="Lire" data-toggle="tooltip" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-play-560" aria-hidden="true"></i></button>
                <button id="id-15" data-original-title="Plus..." aria-haspopup="true" data-toggle="tooltip"
                        role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-more-560" aria-hidden="true"></i></button>
            </div>
            <div class="Measure-scrollContainer-3vb4J">
                <div class="Measure-expandContent-1JQfL"></div>
            </div>
            <div class="Measure-scrollContainer-3vb4J">
                <div class="Measure-shrinkContent-32Udi Measure-expandContent-1JQfL"></div>
            </div>
        </div>
        <div class="PrePlayPageHeader-divider-WQRk8 PageHeaderDivider-pageHeaderDivider-DvwUq"></div>
        <button id="id-14" data-original-title="Montrer les affiches" data-toggle="tooltip" role="button"
                class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO" type="button">
            <i class="plex-icon-toolbar-artwork-560" aria-hidden="true"></i></button>
    </div>
</div>
<div class="PrePlayPageContent-prePlayPageContentContainer-1ckaM PageContent-pageContent-16mK6">
    <div class="PrePlayPageContent-prePlayPageContent-1fFCH Scroller-scroller-d5-b- Scroller-vertical-1bgGS ">
        <div class="PageContent-innerPageContent-3ktLT">
            <div>
                <div style="position: fixed; top: 180px;">
                    <div class="MetadataPosterCard-cardContainer-2gRcQ"
                         data-qa-id="metadataPosterCard--/library/metadata/28283">
                        <div class="MetadataPosterCard-card-3bztR " style="width: 260px; height: 390px;">
                            <div class="PrePlayPosterCard-face-3rQEj MetadataPosterCardFace-face--dz_D MetadataPosterCardFace-poster-L2P6r MetadataPosterCardFace-faceFront-1bxHG  ">
                                <div class="PosterCardImg-imageContainer-1Ar4M" data-movie-id="<?php echo $movie->id; ?>">
                                    <div style="background-image: url(); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                                         class=""></div>
                                </div>
                                <div class=" MetadataPosterCardOverlay-overlay-1uMpL         ">
                                    <div class="MetadataPosterCardOverlay-background-2EwyB"></div>
                                    <div class="MetadataPosterCardOverlay-unwatchedTagContainer-1lcEn"
                                         data-qa-id="metadataPosterUnwatchedBadge">
                                        <div class="MetadataPosterCardOverlay-unwatchedTag-Fqazx MetadataPosterCardOverlay-unwatchedBadge-Qn1fv MetadataPosterCardOverlay-badge-1FU-p"></div>
                                    </div>
                                    <button data-id="<?php echo $movie->id; ?>" tabindex="-1"
                                            role="button"
                                            class="MetadataPosterCardOverlay-playCoverButton-I7oU3 MetadataPosterCardOverlay-playButton-1fjhk PlayButton-playButton-3WX8X MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO"
                                            type="button">
                                        <div class="MetadataPosterCardOverlay-playCircle-M67q6 PlayButton-playCircle-3Evfd MetadataPosterCardOverlay-centerCircle-1Mg-s">
                                            <i class="plex-icon-play-560 PlayButton-playIcon-dt3sk"
                                               aria-hidden="true"></i></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="PrePlayMetadataContent-content-2ww3j" style="padding-left: 320px;">
                    <div>
                        <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                            <div class="PrePlayPrimaryTitle-primaryTitle-1r9P9">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG"><a title="<?php echo $movie->title; ?>"
                                                                                 href="#"
                                                                                 role="link"
                                                                                 class=" Link-link-2XYrU Link-default-32xSO"><?php echo $movie->title; ?></a>
                                </div>
                            </div>
                            <div class="PrePlaySecondaryTitle-secondaryTitle-YJRGC PrePlayPrimaryTitle-primaryTitle-1r9P9"
                                 data-qa-id="preplaySecondTitle">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG">
                                    <span>
                                        <span>
                                            <a title="<?php echo $movie->year; ?>"
                                               href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336/details?key=%2Flibrary%2Fmetadata%2F28083"
                                               role="link"
                                               class=" Link-link-2XYrU Link-default-32xSO"><?php echo $movie->year; ?></a>
                                        </span>
                                    </span>
                                </div>
                                <div class="PrePlayRatingRightTitle-ratingRightTitle-1d4Yy PrePlayRightTitle-rightTitle-VxiwU">
                                    <span
                                            class="PrePlayRatingRightTitle-criticRating-2J_tn"><div
                                                class="CriticRating-container-2t5Lw"><div
                                                    class="CriticRating-rating-1Ntfn"><div
                                                        class="CriticRating-other-uJc1K CriticRating-ratingImage-1bHp5"
                                                        title="Note"></div><?php echo $movie->rating * 10; ?>%
                                                </div></div></span></div>
                            </div>
                            <div class="PrePlayTertiaryTitle-tertiaryTitle-1Rc92">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG">
                                    <span class="PrePlayTertiaryTitleSpacer-tertiaryTitleSpacer-14zhL">
                                        <span><?php echo $movie->getDuration(); ?></span>
                                        <!-- span class="PrePlayDashSeparator-separator-1d01z">·</span>
                                        NOT WATCHED -->
                                    </span>
                                </div>
                                <div class="PrePlayRightTitle-rightTitle-VxiwU">
                                    <span>
                                        <?php foreach ($movie->metadata['Genre'] as $genre) : ?>
                                            <?php $genre = isset($movie->metadata['Genre']['@attributes']) ? $movie->metadata['Genre'] : $genre; ?>
                                            <span>
                                            <a href="#" role="link"
                                               class="PrePlayTagList-tagsListLink-Z6lfX Link-link-2XYrU Link-default-32xSO">
                                                <?php echo $genre['@attributes']['tag']; ?>
                                            </a>,
                                        </span>
                                            <?php if (isset($movie->metadata['Genre']['@attributes'])) {
                                                break;
                                            } ?>
                                        <?php endforeach; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="PrePlayDivider-divider-1qvbj"></div>
                        <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                            <div class="PrePlayDetailsGroup-group-3i0Tj">
                                <?php if ($movie->metadata['Director']) : ?>
                                    <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                        <div class="PrePlayDetailsGroupItem-label-2Ee43">Directed by</div>
                                        <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span>
                                            <?php foreach ($movie->metadata['Director'] as $director) : ?>
                                                <?php $director = isset($movie->metadata['Director']['@attributes']) ? $movie->metadata['Director'] : $director; ?>
                                                <span>
                                                <a href="#" role="link"
                                                   class="PrePlayTagList-tagsListLink-Z6lfX Link-link-2XYrU Link-link-2XYrU Link-default-32xSO">
                                                    <?php echo $director['@attributes']['tag']; ?>
                                                </a>,
                                            </span>
                                                <?php if (isset($movie->metadata['Director']['@attributes'])) {
                                                    break;
                                                } ?>
                                            <?php endforeach; ?>
                                        </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43">Writed by</div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span>
                                            <?php foreach ($movie->metadata['Writer'] as $writer) : ?>
                                                <?php $writer = isset($movie->metadata['Writer']['@attributes']) ? $movie->metadata['Writer'] : $writer; ?>
                                                <span>
                                                <a href="#" role="link"
                                                   class="PrePlayTagList-tagsListLink-Z6lfX Link-link-2XYrU Link-link-2XYrU Link-default-32xSO">
                                                    <?php echo $writer['@attributes']['tag']; ?>
                                                </a>,
                                            </span>
                                                <?php if (isset($movie->metadata['Writer']['@attributes'])) {
                                                    break;
                                                } ?>
                                            <?php endforeach; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43">Studio</div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span>
                                            <span>
                                                <a href="#" role="link"
                                                   class="PrePlayTagList-tagsListLink-Z6lfX Link-link-2XYrU Link-link-2XYrU Link-default-32xSO">
                                                    <?php echo $movie->studio; ?>
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="PrePlayDetailsGroup-group-3i0Tj">
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43">Vidéo</div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span data-qa-id="videoStream">
                                            SD
                                            <span class="DashSeparator-separator-2a3yn">—</span>
                                            MPEG4
                                        </span>
                                    </div>
                                </div>
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43">Audio</div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span>
                                            Inconnu
                                            <span class="DashSeparator-separator-2a3yn">—</span>
                                            MP3 Stéréo
                                        </span>
                                    </div>
                                </div>
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43">Sous-titres</div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU"><span>Aucun</span></div>
                                </div>
                            </div>
                            <div class="PrePlaySummary-summary-1NL8g">
                                <div class="CollapsibleText-contentTransition-15VYv"
                                     style="overflow: hidden; max-height: 78px;">
                                    <div class="Measure-container-2XznZ"><?php echo $movie->summary; ?>
                                        <div class="Measure-scrollContainer-3vb4J">
                                            <div class="Measure-expandContent-1JQfL"></div>
                                        </div>
                                        <div class="Measure-scrollContainer-3vb4J">
                                            <div class="Measure-shrinkContent-32Udi Measure-expandContent-1JQfL"></div>
                                        </div>
                                    </div>
                                </div>
                                <button aria-haspopup="true" role="button"
                                        class="CollapsibleText-readMore-1bRJm DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37  Link-link-2XYrU Link-default-32xSO"
                                        type="button">Show more
                                    <div class="CollapsibleText-readMoreArrow-34BdB DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd "></div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="PrePlayMetadataListInnerContent-innerContent-2CsIz">
                        <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                            <div class="PrePlayCastList-castList-3dQB5"></div>
                            <div class="PrePlayRelatedList-relatedList-2fY8S"
                                 style="opacity: 0; pointer-events: none;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Measure-scrollContainer-3vb4J">
        <div class="Measure-expandContent-1JQfL"></div>
    </div>
    <div class="Measure-scrollContainer-3vb4J">
        <div class="Measure-shrinkContent-32Udi Measure-expandContent-1JQfL"></div>
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
                data: {movie_id: movie_id},
                dataType: 'html'
            }).done(function (view) {
                launchPlayer(view);
            }).fail(function (data) {
                console.error(data);
            });
        });
        $('.PosterCardImg-imageContainer-1Ar4M[data-movie-id]').each(function (index, element) {
            setTimeout(function () {
                var movie_id = $(element).data('movie-id');
                $('[data-movie-id="' + movie_id + '"] > div').css('background-image', 'url("/cover/movie?movie_id='+ movie_id +'&width='+ 260 +'&height='+ 390 +'")');
            }, (index + 1) * 100);
        });
    });
</script>