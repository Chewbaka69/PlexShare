<div class="PrePlayPageHeader-pageHeader-2o14F PageHeader-pageHeader-18RSw">
    <div class="PageHeaderLeft-pageHeaderLeft-2TxSo"><span
                class="PageHeaderBreadcrumbButton-link-1N0DD"><?php echo $tvshow->title; ?></span></div>
    <div class="PageHeaderRight-pageHeaderRight-2CT0g">
        <div class="pageHeaderToolbar-toolbarContainer-2N-IJ Measure-container-2XznZ">
            <div class="pageHeaderToolbar-toolbar-1lW-M">
                <button id="id-22" title="<?php echo __('play'); ?>" data-toggle="tooltip" data-placement="bottom" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-play-560"></i></button>
                <button id="id-23" title="<?php echo __('random_roder'); ?>" data-toggle="tooltip" data-placement="bottom" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-shuffle-560"></i></button>
                <button id="id-24" title="<?php echo __('add_to_queue'); ?>" data-toggle="tooltip" data-placement="bottom"
                        role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-add-to-playlist-560"></i></button>
                <button id="id-21" title="<?php echo __('more'); ?>..." data-toggle="tooltip" data-placement="bottom" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-more-560"></i></button>
            </div>
            <div class="Measure-scrollContainer-3vb4J">
                <div class="Measure-expandContent-1JQfL"></div>
            </div>
            <div class="Measure-scrollContainer-3vb4J">
                <div class="Measure-shrinkContent-32Udi Measure-expandContent-1JQfL"></div>
            </div>
        </div>
        <div class="PrePlayPageHeader-divider-WQRk8 PageHeaderDivider-pageHeaderDivider-DvwUq"></div>
        <button id="id-15" title="<?php echo __('show_poster'); ?>" data-toggle="tooltip" data-placement="bottom" role="button"
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
                                <i class="plex-icon-shows-560  MetadataPosterCardIcon-placeholderIcon-2P76z" aria-hidden="true" style="font-size: 42px; line-height: 390px;"></i>
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
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('studio'); ?></div>
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
                                <div class="CollapsibleText-contentTransition-15VYv" style="overflow: hidden; max-height: 78px;">
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
                                        type="button"><?php echo __('read_more'); ?>
                                    <div class="CollapsibleText-readMoreArrow-34BdB DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd "></div>
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
                                <div class="HubCellTitle-hubCellTitle-2abIn" data-qa-id="hubCellTitle"><?php echo strtoupper(__('seasons')); ?></div>
                            </div>
                            <div>
                                <div class=" " style="width: 100%;">
                                    <?php foreach ($tvshow->getSeasons() as $season) : ?>
                                    <div class=" virtualized-cell-3KPHx"
                                         style="position: relative; width: 137px; height: 206px; display: inline-block; margin-left: 28px; margin-top: 10px">
                                        <div class="MetadataPosterCard-cardContainer-2gRcQ"
                                             data-qa-id="metadataPosterCard--/library/metadata/28083">
                                            <div class="MetadataPosterCard-card-3bztR "
                                                 style="width: 137px; height: 206px;">
                                                <div class="MetadataPosterCardFace-face--dz_D MetadataPosterCardFace-poster-L2P6r MetadataPosterCardFace-faceFront-1bxHG  ">
                                                    <i class="plex-icon-shows-560  MetadataPosterCardIcon-placeholderIcon-2P76z" aria-hidden="true" style="font-size: 30px; line-height: 206px;"></i>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-qa-id="metadataTitleContainer"
                                             class="MetadataPosterCell-titleContainer-24DI6">
                                            <a title="Saison <?php echo $season->number; ?>" href="/season/<?php echo $season->id; ?>" role="link"
                                                    class=" MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F Link-link-2XYrU Link-default-32xSO"><?php echo __('season'); ?> <?php echo $season->number; ?></a>
                                            <span class=" MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY "><?php echo $season->leafCount; ?> <?php echo __('episodes'); ?></span>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="PrePlayMetadataListInnerContent-innerContent-2CsIz">
                            <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                                <div class="PrePlayCastList-castList-3dQB5">
                                    <div class="HubCell-hubCell-3Ys17" style="visibility: visible;" data-qa-id="hub--cast">
                                        <div class="HubCellHeader-hubCellHeader-2pvYN">
                                            <div class="HubCellTitle-hubCellTitle-2abIn" data-qa-id="hubCellTitle"><?php echo strtoupper(__('actors')); ?></div>
                                            <div class="HubCell-hubActions-28w1-">
                                                <button data-qa-id="hubPreviousButton" role="button" class="HubCell-hubScrollButton-2Y7ri Link-link-2XYrU Link-default-32xSO isDisabled " type="button" disabled="">
                                                    <i class="plex-icon-hub-prev-560" aria-hidden="false" aria-label="Page précédente"></i>
                                                </button>
                                                <button data-qa-id="hubNextButton" role="button" class="HubCell-hubScrollButton-2Y7ri Link-link-2XYrU Link-default-32xSO" type="button">
                                                    <i class="plex-icon-hub-next-560" aria-hidden="false" aria-label="Page suivante"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div style="height: 183px; overflow: hidden;">
                                            <div class="Measure-container-3yONE">
                                                <div class="HubCell-hubScroller-2qgkr VirtualListScroller-scroller-37EU_ Scroller-horizontal-cOKsq Scroller-scroller-3GqQc Scroller-horizontal-cOKsq ">
                                                    <?php $translate = -143; ?>
                                                    <div class=" " style="width: 5012px; height: 183px;">
                                                        <?php if(isset($tvshow->getMetadata()['Role'])) : ?>
                                                            <?php foreach ($tvshow->getMetadata()['Role'] as $role) : ?>
                                                                <?php $translate += 148; ?>
                                                                <div data-qa-id="cellItem" style="position: absolute; width: 118px; height: 168px; transform: translate3d(<?php echo $translate; ?>px, 10px, 0px);">
                                                                    <a href="#" role="link" class="PrePlayCastCell-cardLink-Tndv5 Link-link-2XYrU Link-default-32xSO">
                                                                        <div class="TagPosterCard-card-RVD0D MetadataPosterCardFace-poster-L2P6r TagPosterCard-isPerson-1ez1h" style="width: 118px; height: 118px;">
                                                                            <?php if (isset($role['@attributes']['thumb'])) : ?>
                                                                                <div class="PosterCardImg-imageContainer-1Ar4M">
                                                                                    <div style="background-image: url('<?php echo $role['@attributes']['thumb']; ?>'); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;" class=""></div>
                                                                                </div>
                                                                            <?php else : ?>
                                                                                <div style="font-size: 30px; line-height: 118px;" class="Anagram-anagram-2KZ_Z">
                                                                                    <?php
                                                                                    $actor = explode(' ',$role['@attributes']['tag']);
                                                                                    echo substr($actor[0],0,1).substr($actor[1],0,1);
                                                                                    ?>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </a>
                                                                    <div class="PrePlayCastCell-titleContainer-PAy29">
                                                                        <a data-qa-id="castTitle" title="<?php echo $role['@attributes']['tag']; ?>" href="#" role="link" class=" MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F Link-link-2XYrU Link-default-32xSO">
                                                                            <?php echo $role['@attributes']['tag']; ?>
                                                                        </a>
                                                                        <span class=" MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY " title="<?php echo $role['@attributes']['role']; ?>">
                                                                            <?php echo $role['@attributes']['role']; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="Measure-scrollContainer-1c6dy">
                                                    <div class="Measure-expandContent-zsLw6"></div>
                                                </div>
                                                <div class="Measure-scrollContainer-1c6dy">
                                                    <div class="Measure-shrinkContent-303GS Measure-expandContent-zsLw6"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        /** READ MORE **/
        $(document).on('click', '.CollapsibleText-readMore-1bRJm', function (event) {
            var summary = $(document).find('.CollapsibleText-contentTransition-15VYv');

            if(summary.css('max-height') === '78px') {
                $(this).find('div').removeClass('DisclosureArrow-down-1U7WW').addClass('DisclosureArrow-up-1U7WW');
                summary.css('max-height', '10000px');
            } else {
                $(this).find('div').removeClass('DisclosureArrow-up-1U7WW').addClass('DisclosureArrow-down-1U7WW');
                summary.css('max-height', '78px');
            }
        });
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