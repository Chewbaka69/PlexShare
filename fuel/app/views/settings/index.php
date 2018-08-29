<div class="settings-container">
    <div class="web-settings-container show-advanced">
        <div class="filter-bar"></div>
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <ul class="settings-nav nav nav-cards">
                    <li><a class="card btn-gray selected" href="#general-web-group">General</a></li>
                    <li><a class="card btn-gray" href="#quality-web-group">Sub Account</a></li>
                    <li><a class="card btn-gray" href="#player-web-group">Player</a></li>
                </ul>
            </div>
            <div class="col-sm-8 col-md-9">
                <form id="web-settings-form">
                    <div id="general-web-group" class="settings-group active">
                        <h4 class="version-title"> Version 0.1A </h4>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <select id="language">
                                <option value="en" selected=""> English</option>
                                <option value="fr"> Français</option>
                            </select>
                            <p class="help-block">
                                Aidez-nous à traduire cette application dans votre langue <a href="https://transifex.com/plex-1/plex-web" target="_blank">ici</a>.
                            </p>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="input_FriendlyName_c">
                                Second refresh
                            </label>
                            <input id="input_FriendlyName_c" class="form-control" name="refresh" value="" placeholder="ex: 800" type="text">
                            <p class="help-block">Number in second, you want to check new content on server.</p>
                        </div>
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