<div class="PrePlayPageHeader-altPageHeader-3bZbS PrePlayPageHeader-pageHeader-2o14F PageHeader-pageHeader-18RSw">
    <div class="PageHeaderLeft-pageHeaderLeft-2TxSo">
        <a href="/tvshow/<?php echo $episode->getTvShow()->id ; ?>"
            role="link"
            class="PageHeaderBreadcrumbButton-link-1N0DD Link-link-2XYrU Link-default-32xSO"><?php echo $episode->getTvShow()->title; ?></a>
        <button role="button"
                class="PageHeaderBreadcrumbButton-button-1uaPj Season DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37  Link-link-2XYrU Link-default-32xSO"
                type="button"><?php echo $episode->getSeason()->title ; ?>
            <div class="DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd "></div>
        </button>
        <button role="button"
                class="PageHeaderBreadcrumbButton-button-1uaPj Episode DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37 Link-link-2XYrU Link-default-32xSO"
                type="button"><?php echo $episode->title; ?>
            <div class="DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd "></div>
        </button>
    </div>
    <div class="PageHeaderRight-pageHeaderRight-2CT0g">
        <div class="pageHeaderToolbar-toolbarContainer-2N-IJ Measure-container-2XznZ">
            <div class="pageHeaderToolbar-toolbar-1lW-M">
                <a title="<?php echo __('download'); ?>" href="<?php echo $episode->getDownloadLink(); ?>" data-placement="bottom" data-toggle="tooltip" role="button" class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO" type="button">
                    <i class="plex-icon-toolbar-sync-560" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="PrePlayPageHeader-divider-WQRk8 PageHeaderDivider-pageHeaderDivider-DvwUq"></div>
        <div class="Measure-container-2XznZ">
            <div class="pageHeaderToolbar-toolbar-1lW-M">
                <button id="id-16" title="<?php echo __('play'); ?>" data-toggle="tooltip" data-placement="bottom" data-id="<?php echo $episode->id; ?>" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-play-560" aria-hidden="true"></i>
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
        <button id="id-235" title="<?php echo __('show_poster'); ?>" data-placement="bottom" data-toggle="tooltip" role="button"
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
                                <div class="PosterCardImg-imageContainer-1Ar4M" data-movie-id="<?php echo $episode->id; ?>">
                                    <div style="background-image: url(); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                                         class=""></div>
                                </div>
                                <div class=" MetadataPosterCardOverlay-overlay-1uMpL         ">
                                    <div class="MetadataPosterCardOverlay-background-2EwyB"></div>
                                    <div class="MetadataPosterCardOverlay-unwatchedTagContainer-1lcEn"
                                         data-qa-id="metadataPosterUnwatchedBadge">
                                        <div class="MetadataPosterCardOverlay-unwatchedTag-Fqazx MetadataPosterCardOverlay-unwatchedBadge-Qn1fv MetadataPosterCardOverlay-badge-1FU-p"></div>
                                    </div>
                                    <button data-id="<?php echo $episode->id; ?>" tabindex="-1"
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
                    <?php if(isset($episode->getMetaData()['Media']['@attributes']) && (int)$episode->getMetaData()['Media']['@attributes']['videoResolution'] >= 720) : ?>
                        <div class="col-sm-4 text-center" style="font-size: 35px;"><i class="glyphicon video-hd"></i></div>
                    <?php else: ?>
                        <div class="col-sm-4 text-center" style="font-size: 35px;"><i class="glyphicon video-sd"></i></div>
                    <?php endif; ?>

                    <?php if(isset($episode->getMetaData()['Stream']['Audio'][0]) && $episode->getMetaData()['Stream']['Audio'][0]['codec'] === 'ac3') : ?>
                        <div class="col-sm-4 text-center" title="Dolby Digital" data-placement="bottom" data-toggle="tooltip" style="font-size: 35px;"><i class="glyphicon sound-dolby"></i></div>
                    <?php endif; ?>

                    <?php if(isset($episode->getMetaData()['Stream']['Audio'][0]) && preg_match('/7\.1(\([a-z]*\))?/',$episode->getMetaData()['Stream']['Audio'][0]['audioChannelLayout'])) : ?>
                        <div class="col-sm-4 text-center" style="font-size: 35px;"><i class="glyphicon sound-7-1"></i></div>
                    <?php elseif (isset($episode->getMetaData()['Stream']['Audio'][0]) && preg_match('/5\.1(\([a-z]*\))?/',$episode->getMetaData()['Stream']['Audio'][0]['audioChannelLayout'])) : ?>
                        <div class="col-sm-4 text-center" style="font-size: 35px;"><i class="glyphicon sound-5-1"></i></div>
                    <?php elseif (isset($episode->getMetaData()['Stream']['Audio'][0]) && preg_match('/stereo/',$episode->getMetaData()['Stream']['Audio'][0]['audioChannelLayout'])) : ?>
                        <div class="col-sm-4 text-center" title="Stereo" data-placement="bottom" data-toggle="tooltip" style="font-size: 35px;"><i class="glyphicon sound-stereo"></i></div>
                    <?php endif; ?>
                </div>
                <div class="PrePlayMetadataContent-content-2ww3j" style="padding-left: 320px;">
                    <div>
                        <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                            <div class="PrePlayPrimaryTitle-primaryTitle-1r9P9" data-qa-id="preplayMainTitle">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG"><a data-qa-id="metadataTitleLink"
                                                                                 title="<?php echo $episode->getTvShow()->title; ?>"
                                                                                 href="/tvshow/<?php echo $episode->getTvShow()->id; ?>"
                                                                                 role="link"
                                                                                 class=" Link-link-2XYrU Link-default-32xSO"><?php echo $episode->getTvShow()->title; ?></a>
                                </div>
                            </div>
                            <div class="PrePlaySecondaryTitle-secondaryTitle-YJRGC PrePlayPrimaryTitle-primaryTitle-1r9P9"
                                 data-qa-id="preplaySecondTitle">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG"><span><span><a
                                                title="<?php echo $episode->getSeason()->title; ?>"
                                                href="/season/<?php echo $episode->getSeason()->id; ?>"
                                                role="link"
                                                class=" Link-link-2XYrU Link-default-32xSO">S<?php echo $episode->getSeason()->number; ?></a><span
                                                class="DashSeparator-separator-2a3yn">·</span><a
                                                title="<?php echo $episode->title; ?>"
                                                href="#"
                                                role="link"
                                                class=" Link-link-2XYrU Link-default-32xSO">E<?php echo $episode->number; ?></a></span><span
                                            class="DashSeparator-separator-2a3yn">—</span><a
                                            title="<?php echo $episode->title; ?>"
                                            href="#"
                                            role="link"
                                            class=" Link-link-2XYrU Link-default-32xSO"><?php echo $episode->title; ?></a></span>
                                </div>
                                <div class="PrePlayRatingRightTitle-ratingRightTitle-1d4Yy PrePlayRightTitle-rightTitle-VxiwU">
                                    <span class="PrePlayRatingRightTitle-starRating-31XbA"></span>
                                    <span class="PrePlayRatingRightTitle-criticRating-2J_tn">
                                        <div class="CriticRating-container-2t5Lw">
                                            <div class="CriticRating-rating-1Ntfn">
                                                <div class="CriticRating-other-uJc1K CriticRating-ratingImage-1bHp5" title="Note"></div>
                                                <?php echo $episode->rating; ?>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="PrePlayTertiaryTitle-tertiaryTitle-1Rc92">
                                <div class="PrePlayLeftTitle-leftTitle-Ev1KG"><span
                                        class="PrePlayTertiaryTitleSpacer-tertiaryTitleSpacer-14zhL"><span><?php echo $episode->getDuration(); ?></span>
                                        <span
                                            class="PrePlayDashSeparator-separator-1d01z">·</span>
                                        <!-- Non vu</span><a
                                            href="#"
                                            role="link"
                                            class="PrePlayStatusButton-statusButton-28XJ7 Button-default-36soe Button-button--JvPI Link-link-2XYrU Button-small-3Zwli">TV-PG</a-->
                                </div>
                                <div class="PrePlayRightTitle-rightTitle-VxiwU"><?php echo $episode->getReleaseDate(); ?></div>
                            </div>
                        </div>
                        <div class="PrePlayDivider-divider-1qvbj"></div>
                        <div class="PrePlayMetadataInnerContent-innerContent-1BPzw">
                            <div class="PrePlayDetailsGroup-group-3i0Tj" data-qa-id="preplayDetailsContainer">
                                <?php if ($episode->metadata['Director']) : ?>
                                    <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                        <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('directed'); ?></div>
                                        <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span>
                                            <?php foreach ($episode->metadata['Director'] as $director) : ?>
                                                <?php $director = isset($episode->metadata['Director']['@attributes']) ? $episode->metadata['Director'] : $director; ?>
                                                <span>
                                                <a href="#" role="link"
                                                   class="PrePlayTagList-tagsListLink-Z6lfX Link-link-2XYrU Link-default-32xSO">
                                                    <?php echo $director['@attributes']['tag']; ?>
                                                </a>,
                                            </span>
                                                <?php if (isset($episode->metadata['Director']['@attributes'])) {
                                                    break;
                                                } ?>
                                            <?php endforeach; ?>
                                        </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($episode->metadata['Writer']) : ?>
                                    <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                        <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('writed'); ?></div>
                                        <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span>
                                            <?php foreach ($episode->metadata['Writer'] as $writer) : ?>
                                                <?php $writer = isset($episode->metadata['Writer']['@attributes']) ? $episode->metadata['Writer'] : $writer; ?>
                                                <span>
                                                <a href="#" role="link"
                                                   class="PrePlayTagList-tagsListLink-Z6lfX Link-link-2XYrU Link-link-2XYrU Link-default-32xSO">
                                                    <?php echo $writer['@attributes']['tag']; ?>
                                                </a>,
                                            </span>
                                                <?php if (isset($episode->metadata['Writer']['@attributes'])) {
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
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('video'); ?></div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span data-qa-id="videoStream">
                                            <?php if (isset($episode->metadata['Media']['@attributes'])) : ?>
                                            <?php echo strtoupper($episode->metadata['Media']['@attributes']['videoResolution']); ?>
                                            <span class="DashSeparator-separator-2a3yn">—</span>
                                            <?php echo strtoupper($episode->metadata['Media']['@attributes']['videoCodec']); ?>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('audio'); ?></div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span>
                                            <?php echo isset($episode->getMetaData()['Stream']['Audio'][0]['language']) ? $episode->getMetaData()['Stream']['Audio'][0]['language'] : ''; ?>
                                            <span class="DashSeparator-separator-2a3yn">—</span>
                                            <?php echo isset($episode->getMetaData()['Stream']['Audio'][0]['displayTitle']) && isset($episode->getMetaData()['Stream']['Audio'][0]['displayTitle']) ? $episode->getMetaData()['Stream']['Audio'][0]['displayTitle'] : (isset($episode->getMetaData()['Stream']['Audio'][0]['title']) ? $episode->getMetaData()['Stream']['Audio'][0]['title'] : (isset($episode->getMetaData()['Stream']['Audio'][0]['language']) ? $episode->getMetaData()['Stream']['Audio'][0]['language'] : '')); ?>
                                        </span>
                                    </div>
                                </div>
                                <div id="current-sub-titles" class="PrePlayDetailsGroupItem-groupItem-3Tut9">
                                    <div class="PrePlayDetailsGroupItem-label-2Ee43"><?php echo __('subtitles'); ?></div>
                                    <div class="PrePlayDetailsGroupItem-content-1aRNU">
                                        <span>
                                            <?php if(count($subtitles) > 0): ?>
                                                <?php if(count($subtitles) > 1): ?>
                                                    <button aria-haspopup="true" id="id-248" role="button" class="DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37 DisclosureArrowButton-isSelected-oswRN Link-link-2XYrU Link-default-32xSO  Link-isSelected-3GpAs    " type="button">
                                                        <?php echo isset($episode->getMetaData()['Stream']['SubTitle'][0]['language']) ? $episode->getMetaData()['Stream']['SubTitle'][0]['language'] : ''; ?>
                                                        <span class="DashSeparator-separator-2a3yn">—</span>
                                                        <?php echo isset($episode->getMetaData()['Stream']['SubTitle'][0]['displayTitle']) ? $episode->getMetaData()['Stream']['SubTitle'][0]['displayTitle'] : $movie->getMetaData()['Stream']['SubTitle'][0]['title']; ?>
                                                        <div class="DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd DisclosureArrow-isSelected-VMAVr"></div>
                                                    </button>
                                                <?php else: ?>
                                                    <?php echo isset($episode->getMetaData()['Stream']['SubTitle'][0]['language']) ? $episode->getMetaData()['Stream']['SubTitle'][0]['language'] : ''; ?>
                                                    <span class="DashSeparator-separator-2a3yn">—</span>
                                                    <?php echo isset($episode->getMetaData()['Stream']['SubTitle'][0]['displayTitle']) ? $episode->getMetaData()['Stream']['SubTitle'][0]['displayTitle'] : $movie->getMetaData()['Stream']['SubTitle'][0]['title']; ?>
                                                <?php endif; ?>

                                            <?php else: ?>
                                                <?php echo __('none'); ?>
                                            <?php endif;?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="PrePlaySummary-summary-1NL8g">
                                <div class="CollapsibleText-contentTransition-15VYv" style="overflow: hidden; max-height: 78px;">
                                    <div class="Measure-container-2XznZ"><?php echo $episode->summary; ?>
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
                                        type="button"><?php echo __('read_more'); ?>
                                    <div class="CollapsibleText-readMoreArrow-34BdB DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd "></div>
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

<div class="Menu-select-season hidden" style="position: absolute; top: 60px;">
    <div id="id-1865">
        <div role="menu" class="MenuContainer-menu-3Gtlw MenuContainer-medium-2XOYJ">
            <div class="Menu-menuScroller-E0NwY Scroller-vertical-1bgGS Scroller-scroller-d5-b- Scroller-vertical-1bgGS Scroller-auto-3t4gM" style="max-height: 591px;">
                <?php foreach ($seasons as $one_season) : ?>
                    <a role="menuitem" href="/season/<?php echo $one_season->id; ?>" class="<?php echo $one_season->id === $episode->getSeason()->id ? 'SelectedMenuItem-isSelected-3zuEi' : ''; ?> MenuItem-menuItem-25266 MenuItem-default-tX5Cl Link-link-2XYrU Link-default-32xSO">
                        <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                            <div class="SelectedMenuItem-menuLabel-1tKeW"><?php echo $one_season->title; ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="Menu-select-episode hidden" style="position: absolute; top: 60px;">
    <div id="id-1865">
        <div role="menu" class="MenuContainer-menu-3Gtlw MenuContainer-medium-2XOYJ">
            <div class="Menu-menuScroller-E0NwY Scroller-vertical-1bgGS Scroller-scroller-d5-b- Scroller-vertical-1bgGS Scroller-auto-3t4gM" style="max-height: 591px;">
                <?php foreach ($episodes as $one_episode) : ?>
                    <a role="menuitem" href="/episode/<?php echo $one_episode->id; ?>" class="<?php echo $one_episode->id === $episode->id ? 'SelectedMenuItem-isSelected-3zuEi' : ''; ?> MenuItem-menuItem-25266 MenuItem-default-tX5Cl Link-link-2XYrU Link-default-32xSO">
                        <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                            <div class="SelectedMenuItem-menuLabel-1tKeW"><?php echo $one_episode->number; ?> - <?php echo $one_episode->title; ?></div>
                            <?php if ($one_episode->id === $episode->id) : ?>
                                <div class="SelectedMenuItem-selectedIcon-3S2cy"><i class="plex-icon-selected-560" aria-hidden="false" aria-label="Sélectionné(e)"></i></div>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="Menu-select-subtitle hidden" style="position: fixed; top: 420px; left: 520px; will-change: transform;" x-placement="bottom-start">
    <div data-reactroot="" id="id-25">
        <div role="menu" class="MenuContainer-menu-3Gtlw MenuContainer-large-1Hnrd">
            <div class="Menu-menuScroller-E0NwY Scroller-vertical-1bgGS Scroller-scroller-d5-b- Scroller-vertical-1bgGS Scroller-auto-3t4gM" style="max-height: 550px;">
                <button role="menuitem" class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl  Link-link-2XYrU Link-default-32xSO" type="button">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">
                          <span>
                            <span>
                              Aucun
                            </span>
                          </span>
                        </div>
                    </div>
                </button>
                <?php foreach ($subtitles as $subtitle) : ?>
                <button role="menuitem" class="<?php echo isset($subtitle['selected']) ? 'SelectedMenuItem-isSelected-3zuEi' : ''; ?> MenuItem-menuItem-25266 MenuItem-default-tX5Cl  Link-link-2XYrU Link-default-32xSO" type="button">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">
                          <span>
                            <span>
                              <?php echo $subtitle['displayTitle']; ?>
                            </span>
                          </span>
                        </div>
                        <?php if(isset($subtitle['selected'])): ?>
                        <div class="SelectedMenuItem-selectedIcon-3S2cy"><i class="plex-icon-selected-560" aria-hidden="false" aria-label="Sélectionné(e)"></i></div>
                        <?php endif; ?>
                    </div>
                </button>
                <?php endforeach; ?>
            </div>
        </div>
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
        /** SHOW SEASON LIST **/
        $('.PageHeaderBreadcrumbButton-button-1uaPj.Season').on('click', function (event) {
            event.stopPropagation();
            $(this).find('.DisclosureArrow-disclosureArrow-1sBFv').toggleClass('DisclosureArrowButton-down-bd2wx DisclosureArrowButton-up-2fzdj');
            $('.Menu-select-season').css('left', $(this).position().left + 'px');
            $('.Menu-select-season').toggleClass('hidden');
        });
        /** SHOW EPISODE LIST **/
        $('.PageHeaderBreadcrumbButton-button-1uaPj.Episode').on('click', function (event) {
            event.stopPropagation();
            $(this).find('.DisclosureArrow-disclosureArrow-1sBFv').toggleClass('DisclosureArrowButton-down-bd2wx DisclosureArrowButton-up-2fzdj');
            $('.Menu-select-episode').css('left', $(this).position().left + 'px');
            $('.Menu-select-episode').toggleClass('hidden');
        });

        /** SHOW SUB-TITLE LIST **/
        $('#id-248').on('click', function (event) {
            event.stopPropagation();
            $(this).find('.DisclosureArrow-disclosureArrow-1sBFv').toggleClass('DisclosureArrowButton-down-bd2wx DisclosureArrowButton-up-2fzdj');
            $('.Menu-select-subtitle').css('left', $(this).position().left + 240 + 'px');
            $('.Menu-select-subtitle').css('top', $(this).position().top + 150 + 'px');
            $('.Menu-select-subtitle').toggleClass('hidden');
        });

        /** HIDE WHEN CLICK OUTSIDE **/
        $(document).on('mouseup', function() {
            if($('.Menu-select-season').css('display') !== 'none')
                $('.PageHeaderBreadcrumbButton-button-1uaPj.Season').click();

            if($('.Menu-select-episode').css('display') !== 'none')
                $('.PageHeaderBreadcrumbButton-button-1uaPj.Episode').click();

            if($('.Menu-select-subtitle').css('display') !== 'none')
                $('#id-248').click();
        });
        /** PLAY EPISODE **/
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
                console.error(data.responseText);
                show_alert('error', data.responseText);
            });
        });
        $('.PosterCardImg-imageContainer-1Ar4M[data-movie-id]').each(function (index, element) {
            var movie_id = $(element).data('movie-id');
            $('[data-movie-id="' + movie_id + '"] > div').css('background-image', 'url("/cover/movie?movie_id=' + movie_id + '&width=' + 325 + '&height=' + 183 + '&thumb=true")');

            /** CHANGE BACKGROUND **/
            var background = $('.background-container .FullPage-container-3qanw > div > div > div');
            $(background).css('background-image', 'url("/cover/movie?movie_id='+ movie_id +'&width='+ 325 +'&height='+ 488 +'&thumb=true")');
            $(background).css('filter', 'blur(100px)');
            $(background).css('opacity', '0.3');
        });
    });
</script>