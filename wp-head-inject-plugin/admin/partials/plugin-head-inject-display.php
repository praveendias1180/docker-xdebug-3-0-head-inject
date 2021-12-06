<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://praveendias1180.github.io
 * @since      1.0.0
 *
 * @package    Head_Inject
 * @subpackage Head_Inject/admin/partials
 */

/**
 * Check user capabilities
 */
if ( ! current_user_can( 'manage_options' ) ) {
    return;
}

/**
 * Add error/update messages
 * check if the user have submitted the settings
 * WordPress will add the "settings-updated" $_GET parameter to the url
 */
if ( isset( $_GET['settings-updated'] ) ) {
    // add settings saved message with the class of "updated"
    add_settings_error( 'headinjectgroup', 'headinjectgroup', __( 'Settings Saved', 'head-inject' ), 'updated' );
}

/**
 * Show error/update messages
 */
settings_errors( 'headinjectgroup' );
?>

<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting
        settings_fields( 'headinjectgroup' );
        // output setting sections and their fields
        do_settings_sections( 'headinjectgroup' );
        // output save settings button
        submit_button( __( 'Save Settings', 'head-inject' ) );
        ?>
    </form>
</div>