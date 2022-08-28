<?php

// Plugin Name: example plugin
// Description: Add Cutom Header Footer Scripts

function kaung_admin_menu_option()
{
    add_menu_page('Header & Footer Scripts', 'Site Scripts', 'manage_options', 'kaung-admin-menu','kaung_scripts_page','',200);
}

add_action('admin_menu', 'kaung_admin_menu_option');

function kaung_scripts_page()
{
    if(array_key_exists('submit_scripts_update',$_POST))
    {
        update_option('kaung_header_scripts',$_POST['header_scripts']);
        update_option('kaung_footer_scripts', $_POST['footer_scripts']);

        ?>
            <div id="setting-error-settings-updated" class="updated settings-error notice is-dismissible"><strong>Settings have been saved</strong></div>
        <?php
    }

    $header_scripts = get_option('kaung_header_scripts', 'none');
    $footer_scripts = get_option('kaung_footer_scripts', 'none');

    ?>
        <div class="wrap">
            <h2>Update Scripts</h2>

            <form method="post" action="">
                <label for="header_scripts">Header Scripts</label>
                <textarea name="header_scripts" id="header_scripts" class="large-text"><?php print $header_scripts ?></textarea>

                <label for="footer_scripts">Footer Scripts</label>
                <textarea name="footer_scripts" id="footer_scripts" class="large-text"><?php print $footer_scripts ?></textarea>

                <input type="submit" name="submit_scripts_update" class="button button-primary" value="Update Scripts">
            </form>
        </div>
    <?php 
}

    function update_header_scripts()
    {
        $header_scripts = get_option('kaung_header_scripts', 'none');
        print($header_scripts);
    }

    add_action('wp_head','update_header_scripts');

    function update_footer_scripts()
    {
        $footer_scripts = get_option('kaung_footer_scripts', 'none');
        print($footer_scripts);
    }
    add_action('wp_footer', 'update_footer_scripts');
?>