<div class="settings-container">
    <div class="web-settings-container show-advanced">
        <div class="filter-bar"></div>
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <ul class="settings-nav nav nav-cards">
                    <li><a class="card btn-gray selected" href="#general-web-group">General</a></li>
                    <li><a class="card btn-gray" href="#quality-web-group">Sub Account</a></li>
                    <li class="advanced-setting"><a class="card btn-gray" href="#debug-web-group">Débogage</a></li>
                    <li><a class="card btn-gray" href="#player-web-group">Lecteur</a></li>
                </ul>
            </div>
            <div class="col-sm-8 col-md-9">
                <form id="web-settings-form">
                    <div id="general-web-group" class="settings-group active"><h4 class="version-title"> Version
                            3.41.1 </h4>
                        <div class="form-group">
                            <label for="language">Langue</label>
                            <select id="language">
                                <option value="en"> English</option>
                                <option value="fr" selected=""> Français</option>
                            </select>
                            <p class="help-block">Aidez-nous à traduire cette application dans votre langue <a
                                        href="https://transifex.com/plex-1/plex-web" target="_blank">ici</a>.</p>
                        </div>
                        <div class="form-group"><label class="control-label"> <input id="playThemeMusic"
                                                                                     type="checkbox"> Jouer les
                                thèmes musicaux </label>
                            <p class="help-block">Joue automatiquement les fonds musicaux quand disponibles (par ex.
                                le générique d'une série quand vous explorez celle-ci).</p></div>
                        <div class="form-group advanced-setting"><label class="control-label"> <input id="companion"
                                                                                                      checked=""
                                                                                                      type="checkbox">
                                Publier en tant que Lecteur </label>
                            <p class="help-block">Permettre aux autres applications Plex de lancer le contenu sur ce
                                périphérique et de le contrôler à distance.</p></div>
                        <div class="form-group advanced-setting"><label for="allowHttpFallback">Autoriser le retour
                                aux connexions non sécurisées</label> <select id="allowHttpFallback">
                                <option value="never" selected="">Jamais</option>
                                <option value="samenetwork">Sur le même réseau que le serveur</option>
                                <option value="always">Toujours</option>
                            </select>
                            <p class="help-block">Autoriser ce navigateur à effectuer des connexions non sécurisées
                                à Plex Media Server si les connexions sécurisées échouent.</p></div>
                        <div class="form-group"><label for="timeFormat">Format de l'heure</label> <select
                                    id="timeFormat">
                                <option value="h:mma" selected="">12 heures</option>
                                <option value="HH:mm">24 heures</option>
                            </select></div>
                    </div>
                    <div id="quality-web-group" class="settings-group">
                        <div class="form-group"><label class="control-label"> <input id="autoAdjustQuality"
                                                                                     type="checkbox"> Ajustement
                                automatique de la qualité (Bêta) </label>
                            <p class="help-block">Plex will increase or decrease quality based on connection speed.
                                Requires latest Plex Media Server.</p></div>
                        <h4 class="settings-header">Diffusion via Internet</h4>
                        <div class="form-group"><label for="remoteQuality">Qualité vidéo</label> <select
                                    id="remoteQuality" data-type="int">
                                <option value="-1">Maximale</option>
                                <option value="12"> 20 Mbps, 1080p</option>
                                <option value="11"> 12 Mbps, 1080p</option>
                                <option value="10"> 10 Mbps, 1080p</option>
                                <option value="9"> 8 Mbps, 1080p</option>
                                <option value="8"> 4 Mbps, 720p</option>
                                <option value="7"> 3 Mbps, 720p</option>
                                <option value="6" selected=""> 2 Mbps, 720p</option>
                                <option value="5"> 1.5 Mbps, 480p</option>
                                <option value="4"> 0.7 Mbps</option>
                                <option value="3"> 0.3 Mbps</option>
                                <option value="2"> 0.2 Mbps</option>
                            </select>
                            <p class="help-block">Définir la qualité par défaut à utiliser pour le streaming vidéo à
                                travers Internet. Si ce réglage est trop haut, les vidéos pourraient se lancer
                                lentement et se figer fréquemment.</p></div>
                        <div class="form-group"><label class="control-label"> <input
                                        id="remoteSmallVideoAtOriginalQuality" checked="" type="checkbox"> Lire les
                                vidéos plus petites en qualité originale </label>
                            <p class="help-block"> Lorqu'un fichier vidéo est plus petit que la qualité ci-dessus,
                                essayer de lire la vidéo originale sans conversion. Cela lui préserve toute sa
                                qualité, mais la lecture peut s'interrompre fréquemment. "L'ajustement automatique
                                de la qualité" sera désactivé pour ces vidéos. </p></div>
                        <h4 class="settings-header">Diffusion via réseau local</h4>
                        <div class="form-group"><label class="control-label"> <input
                                        id="useHomeStreamingRecommendedSettings" checked="" type="checkbox">
                                Utiliser les paramètres recommandés </label>
                            <p class="help-block recommended-home-streaming-settings">Toutes les vidéos compatibles
                                seront jouées en qualité originale. Les vidéos incompatibles seront converties en
                                qualité maximale.</p></div>
                        <div class="form-group custom-home-streaming-settings hidden"><label for="localQuality">Qualité
                                vidéo</label> <select id="localQuality" data-type="int">
                                <option value="-1">Maximale</option>
                                <option value="12"> 20 Mbps, 1080p</option>
                                <option value="11"> 12 Mbps, 1080p</option>
                                <option value="10"> 10 Mbps, 1080p</option>
                                <option value="9"> 8 Mbps, 1080p</option>
                                <option value="8"> 4 Mbps, 720p</option>
                                <option value="7"> 3 Mbps, 720p</option>
                                <option value="6"> 2 Mbps, 720p</option>
                                <option value="5"> 1.5 Mbps, 480p</option>
                                <option value="4"> 0.7 Mbps</option>
                                <option value="3"> 0.3 Mbps</option>
                                <option value="2"> 0.2 Mbps</option>
                            </select>
                            <p class="help-block">Choisir la qualité vidéo par défaut à utiliser pour le streaming
                                Wi-Fi sur le réseau local. Si ce réglage est trop haut, les vidéos pourraient se
                                lancer lentement et se mettre ne pause fréquemment.</p></div>
                    </div>
                    <div id="debug-web-group" class="settings-group">
                        <div class="form-group"><label for="debugLevel">Niveau de débogage</label> <select
                                    id="debugLevel" data-type="int">
                                <option value="0" selected="">Désactivé</option>
                                <option value="1">Activé</option>
                                <option value="2">Détaillé</option>
                            </select>
                            <p class="help-block">Vous pouvez voir le journal de débogage <a href="#!/logs">ici</a>.
                            </p></div>
                        <div class="form-group"><label class="control-label"> <input id="directPlay" checked=""
                                                                                     type="checkbox"> Lecture
                                directe </label>
                            <p class="help-block"> Autorise le lecteur à lire les médias compatibles sans aucune
                                conversion. La plupart des navigateurs supportent les vidéos MP4 avec codec H264 et
                                audio AAC. Les vidéos avec sous-titres ne peuvent pas être lues directement. </p>
                        </div>
                        <div class="form-group"><label class="control-label"> <input id="directStream" checked=""
                                                                                     type="checkbox"> Diffusion
                                directe </label>
                            <p class="help-block">Permet au serveur de copier les flux audio et vidéo compatibles
                                sans les convertir.</p></div>
                    </div>
                    <div id="player-web-group" class="settings-group"><h4 class="settings-header-first ">Audio &amp;
                            sous-titres</h4>
                        <div class="form-group advanced-setting"><label for="audioBoost">Augmenter le volume du son
                                multi-canal</label> <select id="audioBoost" data-type="int">
                                <option value="100" selected="">Aucun</option>
                                <option value="150">Petite</option>
                                <option value="200">Grande</option>
                                <option value="250">Énorme</option>
                            </select>
                            <p class="help-block">Augmente le volume si le son est converti de multi-canal à
                                stéréo.</p></div>
                        <div class="form-group"><label for="subtitleSize">Taille des sous-titres</label> <select
                                    id="subtitleSize" data-type="int">
                                <option value="50">Minuscule</option>
                                <option value="75">Petite</option>
                                <option value="100" selected="">Normale</option>
                                <option value="125">Grande</option>
                                <option value="200">Énorme</option>
                            </select></div>
                        <div class="form-group advanced-setting"><label for="subtitlesBurnLevel">Incruster les
                                sous-titres</label> <select id="subtitlesBurnLevel">
                                <option value="auto" selected="">Automatique</option>
                                <option value="avoid">Seulement le format des images</option>
                                <option value="always">Toujours</option>
                            </select>
                            <p class="help-block">Détermine si le serveur doit incruster les sous-titres lors de
                                l'encodage, en fonction du format des sous-titres. Eviter l'incrustation des
                                sous-titres améliore les performances du serveur, mais n'est possible qu'avec le
                                lecteur HTML5.</p></div>
                        <h4 class="settings-header">Bonus</h4>
                        <div class="form-group"><label for="extrasPrefixCount">Bandes annonces de Cinema avant le
                                film</label> <select id="extrasPrefixCount" data-type="int">
                                <option value="0" selected="">Aucun</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select></div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="submit-btn btn btn-lg btn-primary btn-loading disabled">
                            <div class="loading loading-sm"></div>
                            <span class="btn-label">Enregistrer les modifications</span></button>
                        <span class="form-message"></span></div>
                </form>
            </div>
        </div>
    </div>
</div>