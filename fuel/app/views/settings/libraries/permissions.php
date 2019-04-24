<div class="settings-container">
    <div class="filter-bar"></div>
    <?php if ($permissions) : ?>
    <?php foreach ($permissions as $permission) : ?>
    <div class="SettingsFormSection-sectionWrapper-1-gPg" style="background-color: rgba(0,0,0,0.15); margin-bottom: 15px; border-bottom: 1px solid rgb(97,97,97)">
        <div class="SettingsFormSection-section-1zYMP">
            <div class="FormGroup-group-15o1H">
                <?php echo $permission->name; ?>
                <div style="float: right;">
                    <label class="switch">
                        <input type="checkbox" data-name="<?php echo $permission->name; ?>" <?php echo isset($library_permissions[$permission->id]) && $library_permissions[$permission->id]->disable === '0' ? 'checked' : ''; ?> />
                        <span class="slider round"></span>
                    </label>
                </div>
                <p class="FormHelp-help-2-ppP">Description of the right, will come here!</p>
                <?php if((int)$permission->parameters === 1) : ?>
                    <p><input class="form-control" style="max-width: 400px;" type="text" data-permission-name="<?php echo $permission->name; ?>" value="<?php echo isset($library_permissions[$permission->id]) ? $library_permissions[$permission->id]->value : ''; ?>" /></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
<script type="text/javascript">
    $(window).on('load', function() {
        $('input[type="checkbox"]').on('click', function (event) {
            $.ajax({
                url: '/rest/library/permission',
                method: 'post',
                data: {
                    library_id: '<?php echo $library_id; ?>',
                    right_name: $(this).data('name'),
                    checked: $(this).is(':checked'),
                    parameter: $('input[data-permission-name="' + $(this).data('name') + '"]').val()
                },
                dataType: 'json'
            }).done(function (view) {
                if(view.error === false)
                    show_alert('success', view.message);
                else
                    show_alert('error', view.message);
            }).fail(function (data) {
                console.error(data);
                show_alert('error', data.responseText);
            });
        });
    });
</script>