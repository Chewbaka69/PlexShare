<div style="display: block; background: rgba(21, 21, 21, 0.79);" aria-hidden="false" class="media-server-modal modal modal-sm fade out">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="glyphicon remove-2"></i></button>
                <h4 class="modal-title"><i class="modal-icon glyphicon server-plus"></i> Add a new server</h4></div>
            <div class="modal-body modal-body-scroll dark-scrollbar">
                <div id="add-plex" class="card-content">
                    <div class="FormGroup-group-15o1H">
                        <form class="Page-page-aq7i_" style="height: auto">
                            <input id="server_id" name="server_id" type="hidden">
                            <div class="PageHeader-pageHeader-18RSw">
                                Plex server information:
                            </div>
                            <div>
                                <label class="FormLabel-label-1sr1f" style="width: 50px; display: inline-block;" for="https">
                                    HTTPS:
                                </label>
                                <div style="display: inline-block;">
                                    <label class="switch">
                                        <input id="https" name="https" type="checkbox" />
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label class="FormLabel-label-1sr1f " for="url">
                                    Plex URL:
                                </label>
                                <input id="url" name="url" placeholder="127.0.0.1"
                                       value=""
                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                       type="text">
                            </div>
                            <div>
                                <label class="FormLabel-label-1sr1f " for="port">
                                    Plex Port:
                                </label>
                                <input id="port" name="port" placeholder="3306"
                                       value=""
                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                       type="text">
                            </div>
                            <div>
                                <label class="FormLabel-label-1sr1f " for="token">
                                    Plex Token:
                                </label>
                                <input id="token" name="token" placeholder="YOURTOKEN"
                                       value=""
                                       class="TextInput-input-34u_B input-input-2ol6B TextInput-large-3XjFh input-large-1cY_k"
                                       type="text">
                            </div>
                        </form>
                    </div>
                    <button class="btn btn-lg btn-primary col-sm-4">
                        <span class="btn-label">Save it!</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left"></div>
                <div class="pull-right"></div>
            </div>
        </div>
    </div>
</div>