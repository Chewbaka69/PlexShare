<div class="PrePlayPageHeader-pageHeader-2o14F PageHeader-pageHeader-18RSw">
    <div class="PageHeaderLeft-pageHeaderLeft-2TxSo"><span
                class="PageHeaderBreadcrumbButton-link-1N0DD"><?php echo $tvshow->title; ?></span></div>
    <div class="PageHeaderRight-pageHeaderRight-2CT0g">
        <div class="pageHeaderToolbar-toolbarContainer-2N-IJ Measure-container-2XznZ">
            <div class="pageHeaderToolbar-toolbar-1lW-M">
                <button id="id-567" aria-label="Lire" data-qa-id="toolbarPlay" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-play-560"
                                                                  aria-hidden="true"></i></button>
                <button id="id-568" aria-label="Visionner la bande annonce." role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-play-trailer-560"
                                                                  aria-hidden="true"></i></button>
                <button id="id-639" aria-label="Ordre aléatoire." data-qa-id="toolbarShuffle" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-shuffle-560"
                                                                   aria-hidden="true"></i></button>
                <button id="id-640" aria-label="Ajouter à la liste de lecture" data-qa-id="toolbarPlaylist"
                        role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-add-to-playlist-560"
                                                                   aria-hidden="true"></i></button>
                <button id="id-566" aria-haspopup="true" data-qa-id="toolbarMore" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button" aria-label="Plus..."><i
                            class="plex-icon-toolbar-more-560" aria-hidden="true"></i></button>
            </div>
            <div class="Measure-scrollContainer-3vb4J">
                <div class="Measure-expandContent-1JQfL"></div>
            </div>
            <div class="Measure-scrollContainer-3vb4J">
                <div class="Measure-shrinkContent-32Udi Measure-expandContent-1JQfL"></div>
            </div>
        </div>
        <div class="PrePlayPageHeader-divider-WQRk8 PageHeaderDivider-pageHeaderDivider-DvwUq"></div>
        <button id="id-563" aria-label="Montrer les affiches" data-qa-id="toolbarToggleArtwork" role="button"
                class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO" type="button">
            <i class="plex-icon-toolbar-artwork-560" aria-hidden="true"></i></button>
    </div>
</div>
<div class="PrePlayPageContent-prePlayPageContentContainer-1ckaM PageContent-pageContent-16mK6">
    <div class="PrePlayPageContent-prePlayPageContent-1fFCH Scroller-scroller-d5-b- Scroller-vertical-1bgGS ">
        <div class="PageContent-innerPageContent-3ktLT">
            <div>
                <div style="position: fixed; top: 180px;">
                    <div class="MetadataPosterCard-cardContainer-2gRcQ">
                        <div class="MetadataPosterCard-card-3bztR " style="width: 260px; height: 390px;">
                            <div class="PrePlayPosterCard-face-3rQEj MetadataPosterCardFace-face--dz_D MetadataPosterCardFace-poster-L2P6r MetadataPosterCardFace-faceFront-1bxHG  ">
                                <div class="PosterCardImg-imageContainer-1Ar4M" data-tvshow-id="<?php echo $tvshow->id; ?>">
                                    <div style="background-image: url(); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                                         class=""></div>
                                </div>
                                <div class=" MetadataPosterCardOverlay-overlay-1uMpL         ">
                                    <div class="MetadataPosterCardOverlay-background-2EwyB"></div>
                                    <button aria-label="Lire Timeless" tabindex="-1"
                                            data-qa-id="metadataPosterPlayButton" role="button"
                                            class="MetadataPosterCardOverlay-playCoverButton-I7oU3 MetadataPosterCardOverlay-playButton-1fjhk PlayButton-playButton-3WX8X MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO      "
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
                    <div class="Measure-container-2XznZ">
                        <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                            <div class="PrePlayPrimaryTitle-primaryTitle-1r9P9" data-qa-id="preplayMainTitle">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG"><?php echo $tvshow->title; ?></div>
                            </div>
                            <div class="PrePlaySecondaryTitle-secondaryTitle-YJRGC PrePlayPrimaryTitle-primaryTitle-1r9P9"
                                 data-qa-id="preplaySecondTitle">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG"><?php echo $tvshow->year; ?></div>
                                <div class="PrePlayRatingRightTitle-ratingRightTitle-1d4Yy PrePlayRightTitle-rightTitle-VxiwU">
                                    <span
                                            class="PrePlayRatingRightTitle-criticRating-2J_tn"><div
                                                class="CriticRating-container-2t5Lw"><div
                                                    class="CriticRating-rating-1Ntfn"><div
                                                        class="CriticRating-other-uJc1K CriticRating-ratingImage-1bHp5"
                                                        title="Note"></div><?php echo ($tvshow->rating * 10); ?>%
                                                </div></div></span></div>
                            </div>
                            <div class="PrePlayTertiaryTitle-tertiaryTitle-1Rc92">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG">
                                    <a href="#" role="link"
                                       class="PrePlayStatusButton-statusButton-28XJ7 Button-default-36soe Button-button--JvPI Link-link-2XYrU Button-default-36soe Button-small-3Zwli Link-link-2XYrU Link-default-32xSO"><?php echo $tvshow->contentRating; ?></a>
                                </div>
                                <div class="PrePlayRightTitle-rightTitle-VxiwU">
                                    <span>
                                        <?php if(isset($tvshow->metadata['Genre'])) :?>
                                            <?php foreach ($tvshow->metadata['Genre'] as $genre) : ?>
                                                <?php $genre = isset($tvshow->metadata['Genre']['@attributes']) ? $tvshow->metadata['Genre'] : $genre; ?>
                                                <span>
                                                    <a href="#" role="link"
                                                       class="PrePlayTagList-tagsListLink-Z6lfX Link-link-2XYrU Link-link-2XYrU Link-default-32xSO"><?php echo $genre['@attributes']['tag']; ?></a>,
                                                </span>
                                                <?php if (isset($tvshow->metadata['Genre']['@attributes'])) {
                                                    break;
                                                } ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="PrePlayDivider-divider-1qvbj"></div>
                        <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                            <div class="PrePlayDetailsGroup-group-3i0Tj">
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43">Studio</div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU"><span><span>
                                                <a href="#" role="link"
                                                        class="PrePlayTagList-tagsListLink-Z6lfX Link-link-2XYrU Link-link-2XYrU Link-default-32xSO"><?php echo $tvshow->studio; ?>
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="PrePlaySummary-summary-1NL8g">
                                <div class="false" style="overflow: hidden; max-height: 78px;">
                                    <div class="Measure-container-2XznZ"><?php echo $tvshow->summary; ?>
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
                                        type="button">Voir plus
                                    <div class="CollapsibleText-readMoreArrow-34BdB DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd "></div>
                                </button>
                            </div>
                        </div>
                        <div class="Measure-scrollContainer-3vb4J">
                            <div class="Measure-expandContent-1JQfL"></div>
                        </div>
                        <div class="Measure-scrollContainer-3vb4J">
                            <div class="Measure-shrinkContent-32Udi Measure-expandContent-1JQfL"></div>
                        </div>
                    </div>
                    <div class="PrePlayMetadataListInnerContent-innerContent-2CsIz">
                        <div class="PrePlayList-container-WZ86O HubCell-hubCell-3Ys17"
                             data-qa-id="preplayContainer--season">
                            <div class="PrePlayDescendantList-descendantHubCellHeader-2qK3U HubCellHeader-hubCellHeader-2pvYN">
                                <div class="HubCellTitle-hubCellTitle-2abIn" data-qa-id="hubCellTitle">SAISONS</div>
                            </div>
                            <div>
                                <div class=" " style="width: 1226px; height: 248px;">
                                    <?php $translate = -132; ?>
                                    <?php foreach ($tvshow->getSeasons() as $season) : ?>
                                    <div class=" virtualized-cell-3KPHx"
                                         style="position: absolute; width: 122px; height: 233px; transform: translate3d(<?php echo $translate += 152; ?>px, 10px, 0px);">
                                        <div class="MetadataPosterCard-cardContainer-2gRcQ"
                                             data-qa-id="metadataPosterCard--/library/metadata/28083">
                                            <div class="MetadataPosterCard-card-3bztR "
                                                 style="width: 137px; height: 206px;">
                                                <div class="MetadataPosterCardFace-face--dz_D MetadataPosterCardFace-poster-L2P6r MetadataPosterCardFace-faceFront-1bxHG  ">
                                                    <div class="PosterCardImg-imageContainer-1Ar4M" data-season-id="<?php echo $season->id; ?>">
                                                        <div style="background-image: url(); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                                                             class=""></div>
                                                    </div>
                                                    <div class=" MetadataPosterCardOverlay-overlay-1uMpL         ">
                                                        <div class="MetadataPosterCardOverlay-background-2EwyB"></div>
                                                        <a href="/season/<?php echo $season->id; ?>" role="link"
                                                           class="MetadataPosterCardOverlay-link-1Swhl Link-link-2XYrU Link-default-32xSO"></a>
                                                        <button aria-label="Lire Saison 1" tabindex="-1"
                                                                data-qa-id="metadataPosterPlayButton" role="button"
                                                                class="MetadataPosterCardOverlay-playButton-1fjhk PlayButton-playButton-3WX8X MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO      "
                                                                type="button">
                                                            <div class="MetadataPosterCardOverlay-playCircle-M67q6 PlayButton-playCircle-3Evfd MetadataPosterCardOverlay-centerCircle-1Mg-s">
                                                                <i class="plex-icon-play-560 PlayButton-playIcon-dt3sk"
                                                                   aria-hidden="true"></i></div>
                                                        </button>
                                                        <button tabindex="-1" aria-label="Éditer Saison 1"
                                                                data-qa-id="metadataPosterEditButton" role="button"
                                                                class="MetadataPosterCardOverlay-editButton-7oR-Q MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO"
                                                                type="button"><i class="plex-icon-edit-560"
                                                                                 aria-hidden="true"></i></button>
                                                        <button data-qa-id="metadataPosterMoreButton" id="id-577"
                                                                tabindex="-1" aria-label="Plus d'actions"
                                                                aria-haspopup="true" role="button"
                                                                class="MetadataPosterCardOverlay-moreButton-3FK-K MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO"
                                                                type="button"><i class="plex-icon-more-560"
                                                                                 aria-hidden="true"></i>
                                                            </button>
                                                        <button aria-label="Sélectionner Saison 1" id="id-576"
                                                                tabindex="-1" role="button"
                                                                class="MetadataPosterCardOverlay-selectButton-3rwSV SelectButton-selectButton-3Kbjm MetadataPosterCardOverlay-button-M43H-  Link-link-2XYrU Link-default-32xSO      "
                                                                type="button">
                                                            <div class="MetadataPosterCardOverlay-selectCircle-3ql8S SelectButton-selectCircle-3tdvG"
                                                                 data-qa-id="multipleSelectButton"><i
                                                                        class="plex-icon-selected-560 SelectButton-selectedIcon-3-SAL"
                                                                        aria-hidden="true"></i></div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-qa-id="metadataTitleContainer"
                                             class="MetadataPosterCell-titleContainer-24DI6">
                                            <a title="Saison <?php echo $season->number; ?>" href="/season/<?php echo $season->id; ?>" role="link"
                                                    class=" MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F Link-link-2XYrU Link-default-32xSO">Saison <?php echo $season->number; ?></a>
                                            <span class=" MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY "><?php echo $season->leafCount; ?> episodes</span>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
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
    $(window).on('load', function() {
        $('.PosterCardImg-imageContainer-1Ar4M[data-tvshow-id]').each(function (index, element) {
            var tvshow_id = $(element).data('tvshow-id');
            $('[data-tvshow-id="' + tvshow_id + '"] > div').css('background-image', 'url("/cover/tvshow?tvshow_id=' + tvshow_id + '&width=' + 325 + '&height=' + 488 + '")');

            /** CHANGE BACKGROUND **/
            var background = $('.background-container .FullPage-container-3qanw > div > div > div');
            $(background).css('background-image', 'url("/cover/tvshow?tvshow_id='+ tvshow_id +'&width='+ 325 +'&height='+ 488 +'")');
            $(background).css('filter', 'blur(100px)');
            $(background).css('opacity', '0.3');
        });
        $('.PosterCardImg-imageContainer-1Ar4M[data-season-id]').each(function (index, element) {
            var season_id = $(element).data('season-id');
            $('[data-season-id="' + season_id + '"] > div').css('background-image', 'url("/cover/season?season_id=' + season_id + '&width=' + 179 + '&height=' + 258 + '")');
        });
    });
</script>