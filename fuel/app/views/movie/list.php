<div class="PageHeader-pageHeader-18RSw">
    <div class="PageHeaderLeft-pageHeaderLeft-2TxSo">
        <button aria-haspopup="true" data-qa-id="typeDropdownButton" id="id-13" role="button"
                class="PageHeaderBreadcrumbButton-button-1uaPj DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37  Link-link-2XYrU Link-default-32xSO"
                type="button">Tous
            <div class="DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd "></div>
        </button>
        <button aria-haspopup="true" data-qa-id="typeDropdownButton" id="id-15" role="button"
                class="PageHeaderBreadcrumbButton-button-1uaPj DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37  Link-link-2XYrU Link-default-32xSO"
                type="button">Films
            <div class="DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd "></div>
        </button>
        <button aria-haspopup="true" data-qa-id="typeDropdownButton" id="id-14" role="button"
                class="PageHeaderBreadcrumbButton-button-1uaPj DisclosureArrowButton-disclosureArrowButton-3tbYZ DisclosureArrowButton-medium-3-Y37  Link-link-2XYrU Link-default-32xSO"
                type="button">Par Titre
            <div class="DisclosureArrowButton-disclosureArrow-34Wg3 DisclosureArrow-disclosureArrow-1sBFv DisclosureArrowButton-down-bd2wx DisclosureArrowButton-medium-3-Y37 DisclosureArrow-down-1U7WW DisclosureArrow-up-rjGpc DisclosureArrow-default-3_FCW DisclosureArrow-medium-3VjTd "></div>
        </button>
        <span class="PageHeaderBadge-badge-sOmD- Badge-badge-1VCQ1 Badge-default-1XnzT"><?php echo count($movies); ?></span>
    </div>
    <div class="PageHeaderRight-pageHeaderRight-2CT0g">
        <div class="pageHeaderToolbar-toolbarContainer-2N-IJ Measure-container-2XznZ">
            <div class="pageHeaderToolbar-toolbar-1lW-M">
                <button id="id-22" aria-label="Tout lire" data-qa-id="toolbarPlay" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-play-560"
                                         aria-hidden="true"></i></button>
                <button id="id-23" aria-label="Ordre aléatoire." data-qa-id="toolbarShuffle" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-shuffle-560"
                                         aria-hidden="true"></i></button>
                <button id="id-26" aria-label="Ajouter à la liste de lecture" data-qa-id="toolbarPlaylist"
                        role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
                        type="button"><i class="plex-icon-toolbar-add-to-playlist-560"
                                         aria-hidden="true"></i></button>
                <button id="id-21" aria-label="Plus..." aria-haspopup="true" data-qa-id="toolbarMore" role="button"
                        class="ToolbarButton-toolbarButton-3xzHJ Link-link-2XYrU Link-default-32xSO"
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
    </div>
</div>
<div class="MetadataListPageContent-metadataListPageContent-s56y9 PageContent-pageContent-16mK6">
    <div class="MetadataListPageContent-metadataListScroller-1uFgY MetadataListPageContent-hasGutter-1EfyE Scroller-scroller-d5-b- Scroller-vertical-1bgGS ">
        <div class=" " style="width: 100%; height: auto;">
            <?php foreach ($movies as $movie) : ?>
                <div class=" virtualized-cell-3KPHx " data-qa-id="cellItem"
                     style="display: inline-block; margin-left: 25px; margin-top: 15px;">
                    <div class="MetadataPosterCard-cardContainer-2gRcQ"
                         data-qa-id="metadataPosterCard--/library/metadata/1">
                        <div class="MetadataPosterCard-card-3bztR " style="width: 126px; height: 189px;">
                            <div class="MetadataPosterCardFace-face--dz_D MetadataPosterCardFace-poster-L2P6r MetadataPosterCardFace-faceFront-1bxHG  ">
                                <i class="plex-icon-shows-560  MetadataPosterCardIcon-placeholderIcon-2P76z" aria-hidden="true" style="font-size: 30px; line-height: 189px;"></i>
                                <div class="PosterCardImg-imageContainer-1Ar4M" data-movie-id="<?php echo $movie->id; ?>">
                                    <div style="background-image: none; background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%; position: absolute; z-index: 2;"
                                         class=""></div>
                                </div>
                                <div class=" MetadataPosterCardOverlay-overlay-1uMpL">
                                    <div class="MetadataPosterCardOverlay-background-2EwyB"></div>
                                    <div class="MetadataPosterCardOverlay-unwatchedTagContainer-1lcEn"
                                         data-qa-id="metadataPosterUnwatchedBadge">
                                        <div class="MetadataPosterCardOverlay-unwatchedTag-Fqazx MetadataPosterCardOverlay-unwatchedBadge-Qn1fv MetadataPosterCardOverlay-badge-1FU-p"></div>
                                    </div>
                                    <a href="/movie/<?php echo $movie->id; ?>" role="link"
                                       class="MetadataPosterCardOverlay-link-1Swhl Link-link-2XYrU Link-default-32xSO"></a>
                                    <button tabindex="-1" data-id="<?php echo $movie->id; ?>"
                                            role="button"
                                            class="MetadataPosterCardOverlay-playButton-1fjhk PlayButton-playButton-3WX8X MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO"
                                            type="button">
                                        <div class="MetadataPosterCardOverlay-playCircle-M67q6 PlayButton-playCircle-3Evfd MetadataPosterCardOverlay-centerCircle-1Mg-s">
                                            <i class="plex-icon-play-560 PlayButton-playIcon-dt3sk"
                                               aria-hidden="true"></i></div>
                                    </button>
                                    <button data-qa-id="metadataPosterMoreButton" id="id-28" tabindex="-1"
                                            aria-label="Plus d'actions" aria-haspopup="true" role="button"
                                            class="MetadataPosterCardOverlay-moreButton-3FK-K MetadataPosterCardOverlay-button-M43H- Link-link-2XYrU Link-default-32xSO"
                                            type="button"><i class="plex-icon-more-560" aria-hidden="true"></i>
                                    </button>
                                    <button aria-label="Sélectionner 13 Hours" id="id-27" tabindex="-1" role="button"
                                            class="MetadataPosterCardOverlay-selectButton-3rwSV SelectButton-selectButton-3Kbjm MetadataPosterCardOverlay-button-M43H-  Link-link-2XYrU Link-default-32xSO"
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
                    <div class="MetadataPosterCell-titleContainer-24DI6">
                        <a title="<?php echo $movie->title; ?>" href="/movie/<?php echo $movie->id; ?>"
                           role="link" style="width: 130px;"
                           class=" MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F   Link-link-2XYrU Link-default-32xSO">
                            <?php echo $movie->title; ?>
                        </a>
                        <span class=" MetadataPosterTitle-singleLineTitle-24_DN MetadataPosterTitle-title-3tU5F MetadataPosterTitle-isSecondary-2VUxY ">
                            <?php echo $movie->year; ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="LibraryPageJumpBar-jumpBar-22VKU" style="height: 100%;">
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">#
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">A
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">B
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">C
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">D
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">E
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">F
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">G
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">H
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">I
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">J
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">K
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">L
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">M
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">N
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">O
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">P
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">R
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">S
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">T
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">U
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">V
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">W
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">X
        </button>
        <button data-qa-id="jumpBarCharacter" role="button"
                class="LibraryPageJumpBarCharacter-character-2Hr4E Link-link-2XYrU Link-default-32xSO"
                type="button">Z
        </button>
    </div>
</div>
<div class="Menu-filter-movies"
     style="position: absolute; top: 60px; left: 160px; display: none;" >
    <div data-reactroot="" id="id-1865">
        <div role="menu" class="MenuContainer-menu-3Gtlw MenuContainer-medium-2XOYJ">
            <div class="Menu-menuScroller-E0NwY Scroller-vertical-1bgGS Scroller-scroller-d5-b- Scroller-vertical-1bgGS Scroller-auto-3t4gM"
                 style="max-height: 591px;"><a data-qa-id="dropdownItem" role="menuitem"
                                               href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=titleSort%3Adesc&amp;save=1"
                                               class=" SelectedMenuItem-isSelected-3zuEi MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Titre</div>
                        <div class="SelectedMenuItem-selectedIcon-3S2cy"><i class="plex-icon-sort-ascending-560"
                                                                            aria-hidden="false"
                                                                            aria-label="Croissant"></i></div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=year%3Adesc&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Année</div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=originallyAvailableAt%3Adesc&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Date de sortie</div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=rating%3Adesc&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Note Critique</div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=userRating%3Adesc&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Évaluation</div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=contentRating%3Adesc&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Évaluation du contenu</div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=duration%3Adesc&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Durée</div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=viewOffset%3Adesc&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">En cours</div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=viewCount%3Adesc&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Lectures</div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=addedAt%3Adesc&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Date d'ajout</div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=lastViewedAt%3Adesc&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Date du visionnage</div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=mediaHeight&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Résolution</div>
                    </div>
                </a><a data-qa-id="dropdownItem" role="menuitem"
                       href="#!/server/df1de861fbaba243c18ed9275fd42e3248d19336?key=%2Flibrary%2Fsections%2F1&amp;typeKey=%2Flibrary%2Fsections%2F1%2Fall%3Ftype%3D1&amp;limit=&amp;sort=mediaBitrate%3Adesc&amp;save=1"
                       class="  MenuItem-menuItem-25266 MenuItem-default-tX5Cl   Link-link-2XYrU Link-default-32xSO">
                    <div class="SelectedMenuItem-menuItemContainer-7SpJZ">
                        <div class="SelectedMenuItem-menuLabel-1tKeW">Débit</div>
                    </div>
                </a></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(window).on('load', function() {
        $(document).on('click', '#id-14', function (event) {
            event.stopPropagation();
            $(this).find('.DisclosureArrow-disclosureArrow-1sBFv').toggleClass('DisclosureArrowButton-down-bd2wx DisclosureArrowButton-up-2fzdj');
            $('.Menu-filter-movies').toggle();
        });
        $(document).on('click', 'body', function (event) {
            event.stopPropagation();
            if($('.Menu-filter-movies').css('display') !== 'none')
                $('#id-14').click();
        });
        /** LAUNCH PLAYER */
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
        /** LOAD IMAGES **/
        $('.MetadataListPageContent-metadataListScroller-1uFgY.MetadataListPageContent-hasGutter-1EfyE.Scroller-scroller-d5-b-.Scroller-vertical-1bgGS').scroll(function() {

            let number = 1;

            $('.PosterCardImg-imageContainer-1Ar4M[data-movie-id]').each(function (index, element) {

                let movie_id = $(element).data('movie-id');
                let position = element.getBoundingClientRect();
                let movie = document.querySelector('[data-movie-id="' + movie_id + '"] > div');

                if( position.top > 0 && position.top <= (window.innerHeight || document.documentElement.clientHeight) && !movie.classList.contains('hasBackground') ) {
                    movie.classList.add('hasBackground');
                    /** IF USING CLOUDFLARE TOO MANY REQUEST **/
                    setTimeout(function () {
                        $('[data-movie-id="' + movie_id + '"] > div')
                            .css('opacity', 0)
                            .css('background-image', 'url("/cover/movie?movie_id=' + movie_id + '&width=' + 175 + '&height=' + 263 + '")')
                            .animate({opacity: 1}, 500);
                    }, 50 +( 50 * number));
                    number++;
                } else if( ( position.top < 0 || position.top > (window.innerHeight || document.documentElement.clientHeight) ) && movie.classList.contains('hasBackground') ) {
                    $('[data-movie-id="' + movie_id + '"] > div').css('background-image', '')
                        .removeClass('hasBackground')
                        .animate({opacity: 0}, 500);
                }
            });
        });

        $('.MetadataListPageContent-metadataListScroller-1uFgY.MetadataListPageContent-hasGutter-1EfyE.Scroller-scroller-d5-b-.Scroller-vertical-1bgGS').scroll();
    });
</script>
