<h2>Buglog</h2>
<form method="post" action="options.php">
    <?php
        settings_fields('buglogsettings');
        do_settings_sections('buglogsettings');
    ?>
    <div class="buglog-form-row">
        <label for="buglog_id" class="buglog-label">Project id:</label>
        <input type="text" name="buglog_id" id="buglog_id" class="buglog-input" value="<?php echo get_option('buglog_id') ?>" />
    </div>
    <div class="buglog-form-row">
        <div class="buglog-label">Visibility:</div>
        <div class="buglog-form-group">
            <input type="radio" name="buglog_visibility" id="buglog_visibility_public" class="buglog-radio" value="public" <?php echo (get_option('buglog_visibility') === 'public') ? 'checked="checked"' : '' ?>>
            <label for="buglog_visibility_public">Display widget for everyone</label>
        </div>
        <div class="buglog-form-group">
            <input type="radio" name="buglog_visibility" id="buglog_visibility_private" class="buglog-radio" value="private" <?php echo (get_option('buglog_visibility') === 'private') ? 'checked="checked"' : '' ?>>
            <label for="buglog_visibility_private">Display widget for a logged in user only</label>
        </div>
    </div>
    <button class="buglog-submit" type="submit">Save</button>
    <p class="buglog-note">
        After creating a project in your <a href="https://buglog.com" target="_blank">buglog</a> profile, you can find the project id inside your installation code.<br />
        For example: https://api.buglog.io/website/XXX/code, where <em>XXX</em> is your project id.
    </p>
</form>

