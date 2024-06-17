<?php
/**
 * Plugin Name: WP fading warning
 * Description: Adds a fading warning at the top of every WP page (once every 10 days)
 * Version: 1.0
 * Author: Arno Lambert <a.lambert@unesco.org>
 */
?>

<!-- this may not be needed if jquery is already here -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php
/**
 * include the javascript for the warning and the fade effect
 *
 * @return void
 */
function custom_javascript_plugin() {
    wp_enqueue_script(
        'custom-script',
        plugin_dir_url( __FILE__ ) . 'js/fadingWarning.js',
        array( 'jquery' ),
        '1.0',
        true
    );
}

//set a cookie to avoid showing the same warning again and again
//the cookie will expire in 10 days
$cookieName = 'newUser';
setcookie(
    $cookieName,
    'fading warning',
    time() + (10 * 86400 * 30),
    '/'
);

if (!isset($_COOKIE[$cookieName])) {
    //first time we see this, no cookie will be present, show the warning
	add_action(
        'wp_enqueue_scripts',
        'custom_javascript_plugin'
    );
}

