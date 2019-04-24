<div class="PrePlayPageHeader-altPageHeader-3bZbS PrePlayPageHeader-pageHeader-2o14F PageHeader-pageHeader-18RSw">
    <div class="PageHeaderLeft-pageHeaderLeft-2TxSo">
        <span class="PageHeaderBreadcrumbButton-link-1N0DD"><?php echo $movie->title; ?></span>
    </div>
    <div class="PageHeaderRight-pageHeaderRight-2CT0g">
        <div class="pageHeaderToolbar-toolbarContainer-2N-IJ Measure-container-2XznZ">
            <div class="pageHeaderToolbar-toolbar-1lW-M">
                <a title="<?php echo __('download'); ?>" href="<?php echo $movie->getDownloadLink() ?>" data-placement="bottom" data-toggle="tooltip" role="button" class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO" type="button">
                    <i class="plex-icon-toolbar-sync-560" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="PrePlayPageHeader-divider-WQRk8 PageHeaderDivider-pageHeaderDivider-DvwUq"></div>
        <div class="Measure-container-2XznZ">
            <div class="pageHeaderToolbar-toolbar-1lW-M">
                <button id="id-16" title="<?php echo __('play'); ?>" data-toggle="tooltip" data-placement="bottom" data-id="<?php echo $movie->id; ?>" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-play-560" aria-hidden="true"></i>
                </button>
                <?php if($movie->trailer !== null) : ?>
                <button id="id-362" title="<?php echo __('watch_trailer'); ?>" data-placement="bottom" data-toggle="tooltip" role="button" class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO" type="button">
                    <i class="plex-icon-toolbar-play-trailer-560" aria-hidden="true"></i>
                </button>
                <?php endif; ?>
                <button id="id-21" title="<?php echo __('mark_as_read'); ?>" data-placement="bottom" data-toggle="tooltip" role="button" class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO" type="button">
                    <i class="plex-icon-toolbar-played-toggle-560" aria-hidden="true"></i>
                </button>
                <button id="id-15" title="<?php echo __('more'); ?>..." aria-haspopup="true" data-placement="bottom" data-toggle="tooltip"
                        role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-more-560" aria-hidden="true"></i>
                </button>
            </div>
            <div class="Measure-scrollContainer-3vb4J">
                <div class="Measure-expandContent-1JQfL"></div>
            </div>
            <div class="Measure-scrollContainer-3vb4J">
                <div class="Measure-shrinkContent-32Udi Measure-expandContent-1JQfL"></div>
            </div>
        </div>
        <div class="PrePlayPageHeader-divider-WQRk8 PageHeaderDivider-pageHeaderDivider-DvwUq"></div>
        <button id="id-14" title="<?php echo __('show_poster'); ?>" data-placement="bottom" data-toggle="tooltip" role="button"
                class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO" type="button">
            <i class="plex-icon-toolbar-artwork-560" aria-hidden="true"></i>
        </button>
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
                                <div class="PosterCardImg-imageContainer-1Ar4M" data-movie-id="<?php echo $movie->id; ?>">
                                    <div style="background-image: url(); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                                         class=""></div>
                                </div>
                                <div class=" MetadataPosterCardOverlay-overlay-1uMpL">
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
                    <?php if($movie->trailer !== null) : ?>
                    <div style="font-size: 20px;padding: 0;" class="col-sm-12 text-center">
                        <button id="id-362" class="Link-link-2XYrU Link-default-32xSO" style="background: #dc3535;border-radius: 3px;padding: 0 7px;width: 100%;margin-top: 15px;">
                            <i class="glyphicon video-hd"></i> <?php echo __('watch_trailer'); ?>
                        </button>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($movie->getMetaData()['Media']['@attributes']) && isset($movie->getMetaData()['Media']['@attributes']['videoResolution']) && (int)$movie->getMetaData()['Media']['@attributes']['videoResolution'] >= 720) : ?>
                        <div class="col-sm-4 text-center" style="font-size: 35px;"><i class="glyphicon video-hd"></i></div>
                    <?php else: ?>
                        <div class="col-sm-4 text-center" style="font-size: 35px;"><i class="glyphicon video-sd"></i></div>
                    <?php endif; ?>

                    <?php if(isset($movie->getMetaData()['Stream']['Audio'][0]) && $movie->getMetaData()['Stream']['Audio'][0]['codec'] === 'ac3') : ?>
                        <div class="col-sm-4 text-center" title="Dolby Digital" data-placement="bottom" data-toggle="tooltip" style="font-size: 35px;"><i class="glyphicon sound-dolby"></i></div>
                    <?php endif; ?>

                    <?php if(isset($movie->getMetaData()['Stream']['Audio'][0]) && preg_match('/7\.1(\([a-z]*\))?/',$movie->getMetaData()['Stream']['Audio'][0]['audioChannelLayout'])) : ?>
                        <div class="col-sm-4 text-center" style="font-size: 35px;"><i class="glyphicon sound-7-1"></i></div>
                    <?php elseif (isset($movie->getMetaData()['Stream']['Audio'][0]) && preg_match('/5\.1(\([a-z]*\))?/',$movie->getMetaData()['Stream']['Audio'][0]['audioChannelLayout'])) : ?>
                        <div class="col-sm-4 text-center" style="font-size: 35px;"><i class="glyphicon sound-5-1"></i></div>
                    <?php elseif (isset($movie->getMetaData()['Stream']['Audio'][0]) && preg_match('/stereo/',$movie->getMetaData()['Stream']['Audio'][0]['audioChannelLayout'])) : ?>
                        <div class="col-sm-4 text-center" title="Stereo" data-placement="bottom" data-toggle="tooltip" style="font-size: 35px;"><i class="glyphicon sound-stereo"></i></div>
                    <?php endif; ?>
                </div>
                <div class="PrePlayMetadataContent-content-2ww3j" style="padding-left: 320px;">
                    <div>
                        <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                            <div class="PrePlayPrimaryTitle-primaryTitle-1r9P9">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG">
                                    <a title="<?php echo $movie->title; ?>" href="#" role="link" class=" Link-link-2XYrU Link-default-32xSO"><?php echo $movie->title; ?></a>
                                </div>
                            </div>
                            <div class="PrePlaySecondaryTitle-secondaryTitle-YJRGC PrePlayPrimaryTitle-primaryTitle-1r9P9"
                                 data-qa-id="preplaySecondTitle">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG">
                                    <span>
                                        <span>
                                            <a title="<?php echo $movie->year; ?>"
                                               href="#"
                                               role="link"
                                               class=" Link-link-2XYrU Link-default-32xSO"><?php echo $movie->year; ?></a>
                                        </span>
                                    </span>
                                </div>
                                <div class="PrePlayRatingRightTitle-ratingRightTitle-1d4Yy PrePlayRightTitle-rightTitle-VxiwU">
                                    <span class="PrePlayRatingRightTitle-criticRating-2J_tn">
                                        <div class="CriticRating-container-2t5Lw">
                                            <div class="CriticRating-rating-1Ntfn">
                                                <div class="CriticRating-imdb-16xaH CriticRating-ratingImage-1bHp5" title="Note"></div>
                                                <?php echo $movie->rating; ?>
                                            </div>
                                        </div>
                                    </span>
                                </div>
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
                                        <?php if(isset($movie->metadata['Genre'])) :?>
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
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="PrePlayDivider-divider-1qvbj"></div>
                        <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                            <div class="PrePlayDetailsGroup-group-3i0Tj">
                                <?php if ($movie->metadata['Director']) : ?>
                                    <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                        <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('directed'); ?></div>
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
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('writed'); ?></div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span>
                                            <?php if(isset($movie->metadata['Writer'])) :?>
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
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('studio'); ?></div>
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
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('video'); ?></div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <?php if (isset($movie->getMetaData()['Media']['@attributes']) && isset($movie->getMetaData()['Media']['@attributes']['videoResolution'])) : ?>
                                        <span data-qa-id="videoStream">
                                            <?php echo $movie->getMetaData()['Media']['@attributes']['videoResolution']; ?>p
                                            <span class="DashSeparator-separator-2a3yn">—</span>
                                            <?php echo $movie->getMetaData()['Stream']['Video'][0]['codec']; ?>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('audio'); ?></div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <?php if (isset($movie->getMetaData()['Stream']['Audio'][0])) : ?>
                                        <span>
                                            <?php echo isset($movie->getMetaData()['Stream']['Audio'][0]['language']) ? $movie->getMetaData()['Stream']['Audio'][0]['language'] : ''; ?>
                                            <span class="DashSeparator-separator-2a3yn">—</span>
                                            <?php echo isset($movie->getMetaData()['Stream']['Audio'][0]['displayTitle']) ? $movie->getMetaData()['Stream']['Audio'][0]['displayTitle'] : (isset($movie->getMetaData()['Stream']['Audio'][0]['title']) ? $movie->getMetaData()['Stream']['Audio'][0]['title'] : $movie->getMetaData()['Stream']['Audio'][0]['language']); ?>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('subtitles'); ?></div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span>
                                            <?php if(count($movie->getMetaData()['Stream']['SubTitle']) > 0): ?>
                                                <?php echo isset($movie->getMetaData()['Stream']['SubTitle'][0]['language']) ? $movie->getMetaData()['Stream']['SubTitle'][0]['language'] : ''; ?>
                                                <span class="DashSeparator-separator-2a3yn">—</span>
                                                <?php echo isset($movie->getMetaData()['Stream']['SubTitle'][0]['displayTitle']) ? $movie->getMetaData()['Stream']['SubTitle'][0]['displayTitle'] : $movie->getMetaData()['Stream']['SubTitle'][0]['title']; ?>
                                            <?php else: ?>
                                                <?php echo __('none'); ?>
                                            <?php endif;?>
                                        </span>
                                    </div>
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
                                        type="button"><?php echo __('read_more'); ?>
                                    <div class="CollapsibleText-readMoreArrow-34BdB DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd "></div>
                                </button>
                            </div>
                        </div>
                        <?php if(isset($movie->getMetadata()['Role'])) : ?>
                        <div class="PrePlayMetadataListInnerContent-innerContent-2CsIz">
                            <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                                <div class="PrePlayCastList-castList-3dQB5">
                                    <div class="HubCell-hubCell-3Ys17" style="visibility: visible;" data-qa-id="hub--cast">
                                        <div class="HubCellHeader-hubCellHeader-2pvYN">
                                            <div class="HubCellTitle-hubCellTitle-2abIn" data-qa-id="hubCellTitle"><?php echo __('actors'); ?></div>
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
                                                            <?php foreach ($movie->getMetadata()['Role'] as $role) : ?>
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
                                                                                    echo substr($actor[0],0,1).(isset($actor[1]) ? substr($actor[1],0,1) : '');
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
                        <?php endif; ?>
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
        /** LAUNCH PLAYER **/
        $(document).on('click', '#id-16, .MetadataPosterCardOverlay-playButton-1fjhk.PlayButton-playButton-3WX8X', function (event) {
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
        /** LAUNCH TRAILER **/
        $(document).on('click', '#id-362', function (event) {
            var height = $(window).height();
            var width = $(window).width();
            $(document).find('body').append('<div id="youtube-iframe" style="position: absolute; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); z-index:1;">' +
                '<iframe style="position: absolute; margin: auto; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index:2;" width="' + (width/3*2) + '" height="' + (height/3*2) + '" src="<?php echo $movie->trailer; ?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' +
            '</div>');
        });
        $(document).on('click', '#youtube-iframe', function (event) {
            event.target.remove();
        });
        /** LOAD IMG **/
        $('.PosterCardImg-imageContainer-1Ar4M[data-movie-id]').each(function (index, element) {
            var movie_id = $(element).data('movie-id');
            $('[data-movie-id="' + movie_id + '"] > div').css('background-image', 'url("/cover/movie?movie_id='+ movie_id +'&width='+ 325 +'&height='+ 488 +'")');

            /** CHANGE BACKGROUND **/
            var background = $('.background-container .FullPage-container-3qanw > div > div > div');
            $(background).css('background-image', 'url("/cover/movie?movie_id='+ movie_id +'&width='+ 325 +'&height='+ 488 +'")');
            $(background).css('filter', 'blur(100px)');
            $(background).css('opacity', '0.3');
        });
    });
</script>