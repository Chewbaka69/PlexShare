<input id="data_movie" type="hidden" data-src="<?php echo $movie->getStreamUrl($user_settings); ?>"/>
<input id="data_movie_id" type="hidden" data-movie-id="<?php echo $movie->id; ?>"/>
<button aria-label="Lire" role="playCenter" type="button"
        class="PlayPauseOverlay-playButton-25OfW PlayButton-playButton-3WX8X Link-link-2XYrU Link-default-32xSO"
        style="z-index: 0">
    <div class="PlayPauseOverlay-playCircle-3ydPY PlayButton-playCircle-3Evfd"><i
                class="plex-icon-play-560 PlayPauseOverlay-playIcon-21tOf PlayButton-playIcon-dt3sk"
                aria-hidden="true"></i></div>
</button>
<div class="AudioVideoFullPlayer-topBar-2XUGM AudioVideoFullPlayer-bar-dDYeo" style="z-index: 0">
    <div class="FullPlayerTopControls-topControls-2gkcE">
        <div>
            <button aria-label="Réduire le lecteur" title="Réduire le lecteur" data-qa-id="minimizePlayerButton"
                    role="button"
                    class="FullPlayerTopControls-topButton-2iGrJ PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO"
                    type="button"><i class="plex-icon-player-minimize-560" aria-hidden="true"></i></button>
        </div>
        <div>
            <button aria-haspopup="true" id="id-1451" role="button"
                    class="FullPlayerTopControls-castButton-1CwQ3 FullPlayerTopControls-topButton-2iGrJ PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6 DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37  Link-link-2XYrU Link-default-32xSO"
                    type="button"><i class="plex-icon-player-companion-cast-560" aria-hidden="true"></i>
                <div class="DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd"></div>
            </button>
            <button aria-label="Entrer en mode plein écran" title="Entrer en mode plein écran"
                    data-qa-id="fullscreenButton" role="button"
                    class="FullPlayerTopControls-topButton-2iGrJ PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6 Link-link-2XYrU Link-default-32xSO"
                    type="button"><i class="plex-icon-player-fullscreen-560" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
<!-- Quality choice -->
<div class="AudioVideoPlaybackSettings-container-2pTAj AudioVideoStripeContainer-container-MI02O" style="transform: translateY(246px)">
    <div class="AudioVideoPlaybackSettings-title-2MRYF">Configuration de la lecture</div>
    <div class="AudioVideoPlaybackSettings-menusContainer-2bvbj" data-qa-id="playbackSettingsContainer">
        <div class="AudioVideoSettingsRow-row-2CrSz ">
            <div class="AudioVideoSettingsRow-label-2h0yy AudioVideoSettingsRow-cell-24KvK">Qualité</div>
            <div class="AudioVideoSettingsRow-cell-24KvK">
                <button aria-haspopup="true" id="id-221" data-qa-id="videoQuality" role="button"
                        class="DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37 DisclosureArrowButton-isSelected-oswRN Link-link-2XYrU Link-default-32xSO Link-medium-2KGbN Link-isSelected-3GpAs    "
                        type="button">Convertir (Maximum)
                    <div class="DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd DisclosureArrow-isSelected-VMAVr"></div>
                </button>
            </div>
        </div>
        <div class="AudioVideoSettingsRow-row-2CrSz ">
            <div class="AudioVideoSettingsRow-label-2h0yy AudioVideoSettingsRow-cell-24KvK">Flux Audio</div>
            <div class="AudioVideoSettingsRow-cell-24KvK"><span data-qa-id="audioStream">Inconnu
                    <span class="DashSeparator-separator-2a3yn">—</span>MP3 Stéréo
                    </span></div>
        </div>
        <div class="AudioVideoSettingsRow-row-2CrSz ">
            <div class="AudioVideoSettingsRow-label-2h0yy AudioVideoSettingsRow-cell-24KvK">Sous-titres</div>
            <div class="AudioVideoSettingsRow-cell-24KvK"><span><span data-qa-id="subtitleStream">Aucun
                        </span></span></div>
        </div>
    </div>
    <div class="Measure-scrollContainer-3vb4J">
        <div class="Measure-expandContent-1JQfL"></div>
    </div>
    <div class="Measure-scrollContainer-3vb4J">
        <div class="Measure-shrinkContent-32Udi Measure-expandContent-1JQfL"></div>
    </div>
</div>
<div class="AudioVideoFullPlayer-bottomBar-2yixi AudioVideoFullPlayer-bar-dDYeo"
     style="bottom: -86px; height: 86px; z-index: 0">
    <div class="AudioVideoBottomBar-controlsContainer-2c743">
        <div>
            <div class="AudioVideoBottomBar-seekBar-2ai3z SeekBar-seekBar-2UK3i Slider-slider-2oLVT Slider-hasAutoHideThumb-tpdhC">
                <div class="SeekBar-seekBarTrack-3Gu5R Slider-track-28JOS">
                    <div class="SeekBar-seekBarBuffer-3bUz9 Slider-secondaryFill-31_05 Slider-fill-35GFq "
                         style="transform: scaleX(0);"></div>
                    <div class="SeekBar-seekBarFill-1Lcu0 Slider-fill-35GFq "
                         style="transform: scaleX(0);"></div>
                </div>
                <div class="Slider-thumbTrack-21hGV" style="transform: translateX(-100%);">
                    <button id="buttonTrack" role="slider" aria-valuemin="0"
                            aria-valuemax="<?php echo $movie->duration; ?>" aria-valuenow="0"
                            class="Slider-thumb-2QGiU Link-link-2XYrU Link-link-2XYrU Link-default-32xSO"
                            type="range"></button>
                </div>
        </div>
    </div>
    <div class="AudioVideoPlayerControls-controls-OwK1f">
        <div class="AudioVideoPlayerControls-buttonGroupLeft-3kwFX AudioVideoPlayerControls-buttonGroup-ShnOa">
            <div class="AudioVideoPlayerControls-titlesButtonGroup-2V4Qg AudioVideoPlayerControls-buttonGroup-ShnOa">
                <div class="AudioVideoPlayerControls-metadataContainer-3h2Oi AudioVideoPlayerControlsMetadata-container-2PqUx ">
                    <?php if ($movie->type === 'episode') : ?>
                        <div class="AudioVideoPlayerControlsMetadata-titlesContainer-1oLik">
                            <a title="<?php echo $movie->getTvShow()->title; ?>" href="/tvshow/<?php echo $movie->getTvShow()->id; ?>" role="link"
                               class=" MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F Link-link-2XYrU Link-default-32xSO">
                                <?php echo $movie->getTvShow()->title; ?>
                            </a>
                            <span class=" MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY ">
                                <span>
                                    <a title="Saison <?php echo $movie->getSeason()->number; ?>" href="/season/<?php echo $movie->getSeason()->id; ?>" role="link"
                                       class=" Link-link-2XYrU Link-default-32xSO">S<?php echo $movie->getSeason()->number; ?></a>
                                    <span class="DashSeparator-separator-2a3yn">·</span>
                                    <a title="<?php echo $movie->title; ?>" href="#" role="link"
                                       class=" Link-link-2XYrU Link-default-32xSO">E<?php echo $movie->number; ?></a>
                                </span>
                                <span class="DashSeparator-separator-2a3yn">—</span>
                                <a data-qa-id="metadataTitleLink" title="<?php echo $movie->title; ?>" href="#"
                                   role="link" class=" Link-link-2XYrU Link-default-32xSO">
                                    <?php echo $movie->title; ?>
                                </a>
                            </span>
                        </div>
                    <?php else : ?>
                        <div class="AudioVideoPlayerControlsMetadata-titlesContainer-1oLik">
                            <a title="<?php echo $movie->title; ?>" href="/movie/<?php echo $movie->id; ?>" role="link"
                               class=" MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F Link-link-2XYrU Link-default-32xSO">
                                <?php echo $movie->title; ?>
                            </a>
                            <span class="MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY ">
                                <?php echo $movie->year; ?>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="AudioVideoPlayerControls-durationContainer-3TK0D">
                <button data-qa-id="mediaDuration" role="button"
                        class="DurationRemaining-container-1F4w8 Link-link-2XYrU Link-default-32xSO"
                        type="button"><span class="media-time">00:00</span> / <span
                            class="media-duration"><?php echo $movie->getDurationMovie(); ?></span></button>
            </div>
        </div>
        <div class="AudioVideoPlayerControls-buttonGroupCenter-Vok98 AudioVideoPlayerControls-buttonGroup-ShnOa">
            <button aria-label="Répéter" title="Répéter" data-qa-id="repeatButton" role="button"
                    class="PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO      "
                    type="button"><i class="plex-icon-player-repeat-560" aria-hidden="true"></i></button>
            <button aria-label="Précédent" title="Précédent" data-qa-id="previousButton" role="button"
                    class="PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6 IconButton-isDisabled-2Wi5U  Link-link-2XYrU Link-default-32xSO     isDisabled "
                    type="button" disabled=""><i class="plex-icon-player-prev-560" aria-hidden="true"></i>
            </button>
            <button aria-label="Reculer (30 secondes)" title="Reculer (30 secondes)" data-qa-id="skipBackButton"
                    role="button"
                    class="PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO      "
                    type="button"><i class="plex-icon-player-skip-back-560" aria-hidden="true"></i></button>
            <button aria-label="Lire" title="Lire" data-qa-id="resumeButton" role="button"
                    class="PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO      "
                    type="button"><i class="plex-icon-player-play-560" aria-hidden="true"></i></button>
            <button aria-label="Avancer (30 secondes)" title="Avancer (30 secondes)"
                    data-qa-id="skipForwardButton" role="button"
                    class="PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO      "
                    type="button"><i class="plex-icon-player-skip-forward-560" aria-hidden="true"></i></button>
            <button aria-label="Suivant" title="Suivant" data-qa-id="nextButton" role="button"
                    class="PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO      "
                    type="button"><i class="plex-icon-player-next-560" aria-hidden="true"></i></button>
            <button aria-label="Ordre aléatoire." title="Ordre aléatoire." data-qa-id="shuffleButton"
                    role="button"
                    class="PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO      "
                    type="button"><i class="plex-icon-player-shuffle-560" aria-hidden="true"></i></button>
        </div>
        <div class="AudioVideoPlayerControls-buttonGroupRight-17650 AudioVideoPlayerControls-buttonGroup-ShnOa">
            <div class="AudioVideoPlayerControls-auxButtons-2YhIh"><span><button aria-label="Plus d'actions"
                                                                                 title="Plus d'actions"
                                                                                 id="id-1453"
                                                                                 data-qa-id="moreButton"
                                                                                 role="button"
                                                                                 class="PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO      "
                                                                                 type="button"><i
                                class="plex-icon-player-more-560" aria-hidden="true"></i></button>
                        </span>
                <button aria-label="Réglages" title="Réglages" data-qa-id="videoSettingsButton" role="button"
                        class="PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO      "
                        type="button"><i class="plex-icon-player-video-settings-560" aria-hidden="true"></i>
                </button>
            </div>
            <div>
                <button aria-label="Lire la liste de lecture" title="Lire la liste de lecture"
                        data-qa-id="playQueueButton" role="button"
                        class="PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO      "
                        type="button"><i class="plex-icon-player-queue-560" aria-hidden="true"></i></button>
                <span><button aria-label="Sourdine" title="Sourdine" data-qa-id="volumeButton" role="button"
                              class="PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO      "
                              type="button"><i class="plex-icon-player-volume-high-560" aria-hidden="true"></i></button><div
                            class="VolumeSlider-slider-1QXdT Slider-slider-2oLVT   Slider-hasAutoHideThumb-tpdhC"><div
                                class="VolumeSlider-track-2WJDz Slider-track-28JOS"><div
                                    class="VolumeSlider-fill-3XkYy Slider-fill-35GFq"
                                    style="transform: scaleX(1);"></div></div><div
                                class="Slider-thumbTrack-21hGV" style="transform: translateX(0%);">
                                <button id="buttonVolume"
                                        role="slider" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100"
                                        class="Slider-thumb-2QGiU Link-link-2XYrU Link-default-32xSO      "
                                        type="range"></button></div></div></span>
                <button aria-label="Fermer le Lecteur" title="Fermer le Lecteur" data-qa-id="closeButton"
                        role="button"
                        class="AudioVideoPlayerControls-closeButton-2ULmA PlayerIconButton-playerButton-1DmNp IconButton-button-2FVq6   Link-link-2XYrU Link-default-32xSO      "
                        type="button"><i class="plex-icon-close-560" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
</div>