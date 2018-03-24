<div class="PrePlayPageHeader-altPageHeader-3bZbS PrePlayPageHeader-pageHeader-2o14F PageHeader-pageHeader-18RSw">
    <div class="PageHeaderLeft-pageHeaderLeft-2TxSo"><a
                href="/tvshow/<?php echo $movie->getTvShow()->id ; ?>"
                role="link"
                class="PageHeaderBreadcrumbButton-link-1N0DD Link-link-2XYrU Link-default-32xSO"><?php echo $movie->getTvShow()->title; ?></a><a
                href="/season/<?php echo $movie->getSeason()->id; ?>"
                role="link"
                class="PageHeaderBreadcrumbButton-link-1N0DD Link-link-2XYrU Link-default-32xSO"><?php echo $movie->getSeason()->title; ?></a>
        <button aria-haspopup="true" data-qa-id="typeDropdownButton" id="id-233" role="button"
                class="PageHeaderBreadcrumbButton-button-1uaPj DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37 Link-link-2XYrU Link-default-32xSO"
                type="button"><?php echo $movie->title; ?>
            <div class="DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd "></div>
        </button>
    </div>
    <div class="PageHeaderRight-pageHeaderRight-2CT0g">
        <div class="pageHeaderToolbar-toolbarContainer-2N-IJ Measure-container-2XznZ">
            <div class="pageHeaderToolbar-toolbar-1lW-M">
                <button id="id-239" data-original-title="Lire" data-toggle="tooltip" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO      "
                        type="button"><i class="plex-icon-toolbar-play-560"
                                         aria-hidden="true"></i></button>
                <button id="id-238" data-original-title="Plus..." aria-haspopup="true" data-toggle="tooltip" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO      "
                        type="button"><i class="plex-icon-toolbar-more-560"
                                         aria-hidden="true"></i></button>
            </div>
            <div class="Measure-scrollContainer-3vb4J">
                <div class="Measure-expandContent-1JQfL"></div>
            </div>
            <div class="Measure-scrollContainer-3vb4J">
                <div class="Measure-shrinkContent-32Udi Measure-expandContent-1JQfL"></div>
            </div>
        </div>
        <div class="PrePlayPageHeader-divider-WQRk8 PageHeaderDivider-pageHeaderDivider-DvwUq"></div>
        <button id="id-235" data-original-title="Montrer les affiches" data-toggle="tooltip" role="button"
                class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO      " type="button">
            <i class="plex-icon-toolbar-artwork-560" aria-hidden="true"></i></button>
        <div class="PrePlayPageHeader-divider-WQRk8 PageHeaderDivider-pageHeaderDivider-DvwUq"></div>
        <div><a id="id-236" data-qa-id="toolbarPrevious"
                href="#"
                role="link" class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO      ">
                <i class="plex-icon-page-prev-560" aria-hidden="true"></i></a>
            <a id="id-237" data-qa-id="toolbarNext" href="#" role="link"
               class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO">
                <i class="plex-icon-page-next-560" aria-hidden="true"></i></a></div>
    </div>
</div>
<div class="PrePlayPageContent-prePlayPageContentContainer-1ckaM PageContent-pageContent-16mK6">
    <div class="PrePlayPageContent-prePlayPageContent-1fFCH Scroller-scroller-d5-b- Scroller-vertical-1bgGS ">
        <div class="PageContent-innerPageContent-3ktLT">
            <div>
                <div style="position: fixed; top: 180px;">
                    <div class="MetadataPosterCard-cardContainer-2gRcQ"
                         data-qa-id="metadataPosterCard--/library/metadata/28283">
                        <div class="MetadataPosterCard-card-3bztR " style="width: 260px; height: 146px;">
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
                            <div class="PrePlayPrimaryTitle-primaryTitle-1r9P9" data-qa-id="preplayMainTitle">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG"><a data-qa-id="metadataTitleLink"
                                                                                 title="<?php echo $movie->getTvShow()->title; ?>"
                                                                                 href="/tvshow/<?php echo $movie->getTvShow()->id; ?>"
                                                                                 role="link"
                                                                                 class=" Link-link-2XYrU Link-default-32xSO"><?php echo $movie->getTvShow()->title; ?></a>
                                </div>
                            </div>
                            <div class="PrePlaySecondaryTitle-secondaryTitle-YJRGC PrePlayPrimaryTitle-primaryTitle-1r9P9"
                                 data-qa-id="preplaySecondTitle">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG"><span><span><a
                                                    title="<?php echo $movie->getSeason()->title; ?>"
                                                    href="/season/<?php echo $movie->getSeason()->id; ?>"
                                                    role="link"
                                                    class=" Link-link-2XYrU Link-default-32xSO">S<?php echo $movie->getSeason()->number; ?></a><span
                                                    class="DashSeparator-separator-2a3yn">·</span><a
                                                    title="<?php echo $movie->title; ?>"
                                                    href="#"
                                                    role="link"
                                                    class=" Link-link-2XYrU Link-default-32xSO">E<?php echo $movie->number; ?></a></span><span
                                                class="DashSeparator-separator-2a3yn">—</span><a
                                                title="<?php echo $movie->title; ?>"
                                                href="#"
                                                role="link"
                                                class=" Link-link-2XYrU Link-default-32xSO"><?php echo $movie->title; ?></a></span>
                                </div>
                                <div class="PrePlayRatingRightTitle-ratingRightTitle-1d4Yy PrePlayRightTitle-rightTitle-VxiwU">
                                    <span class="PrePlayRatingRightTitle-starRating-31XbA"></span><span
                                            class="PrePlayRatingRightTitle-criticRating-2J_tn"><div
                                                class="CriticRating-container-2t5Lw"><div
                                                    class="CriticRating-rating-1Ntfn"><div
                                                        class="CriticRating-other-uJc1K CriticRating-ratingImage-1bHp5"
                                                        title="Note"></div><?php echo $movie->rating * 10; ?>%
                                                </div></div></span></div>
                            </div>
                            <div class="PrePlayTertiaryTitle-tertiaryTitle-1Rc92">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG"><span
                                            class="PrePlayTertiaryTitleSpacer-tertiaryTitleSpacer-14zhL"><span><?php echo $movie->getDuration(); ?></span>
                                        <span
                                                class="PrePlayDashSeparator-separator-1d01z">·</span>
                                        <!-- Non vu</span><a
                                            href="#"
                                            role="link"
                                            class="PrePlayStatusButton-statusButton-28XJ7 Button-default-36soe Button-button--JvPI Link-link-2XYrU Button-small-3Zwli">TV-PG</a-->
                                </div>
                                <div class="PrePlayRightTitle-rightTitle-VxiwU"><?php echo $movie->getReleaseDate(); ?></div>
                            </div>
                        </div>
                        <div class="PrePlayDivider-divider-1qvbj"></div>
                        <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                            <div class="PrePlayDetailsGroup-group-3i0Tj" data-qa-id="preplayDetailsContainer">
                                <?php if ($movie->metadata['Director']) : ?>
                                    <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                        <div class="PrePlayDetailsGroupItem-label-2Ee43">Directed by</div>
                                        <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span>
                                            <?php foreach ($movie->metadata['Director'] as $director) : ?>
                                                <?php $director = isset($movie->metadata['Director']['@attributes']) ? $movie->metadata['Director'] : $director; ?>
                                                <span>
                                                <a href="#" role="link"
                                                   class="PrePlayTagList-tagsListLink-Z6lfX Link-link-2XYrU Link-default-32xSO">
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
                                <?php if ($movie->metadata['Writer']) : ?>
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
                                <?php endif; ?>
                            </div>
                            <div class="PrePlayDetailsGroup-group-3i0Tj" data-qa-id="preplayDetailsContainer">
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43">Vidéo</div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span data-qa-id="videoStream">
                                            <?php echo strtoupper($movie->metadata['Media']['@attributes']['videoResolution']); ?>
                                            <span class="DashSeparator-separator-2a3yn">—</span>
                                            <?php echo strtoupper($movie->metadata['Media']['@attributes']['videoCodec']); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43">Audio</div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span data-qa-id="audioStream">
                                            Inconnu
                                            <span class="DashSeparator-separator-2a3yn">—</span>
                                            MP3 Stéréo
                                        </span></div>
                                </div>
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43">Sous-titres</div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU"><span>Aucun</span></div>
                                </div>
                            </div>
                            <div class="PrePlaySummary-summary-1NL8g">
                                <div class="CollapsibleText-contentTransition-15VYv" style="overflow: hidden; max-height: 78px;">
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
                                        class="CollapsibleText-readMore-1bRJm DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37 Link-link-2XYrU Link-default-32xSO"
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
        $('.PosterCardImg-imageContainer-1Ar4M[data-movie-id]').each(function (index, element) {
            setTimeout(function () {
                var movie_id = $(element).data('movie-id');
                $('[data-movie-id="' + movie_id + '"] > div').css('background-image', 'url("/cover/movie?movie_id=' + movie_id + '&width=' + 260 + '&height=' + 146 + '&thumb=true")');
            }, (index + 1) * 500);
        });
    });
</script>