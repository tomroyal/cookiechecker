<?php
/**
 * Plugin Name: CookieChecker
 * Plugin URI: https://mndigital.co
 * Description: A simple plugin to print_r the current cookies - useful for checking if caching is interfering
 * Version: 1.0.0
 * Author: Tom Royal
 * Author URI: https://tomroyal.com
 * Text Domain: mndm
 * Namespace: mndmcookie
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

// add admin menu
add_action("admin_menu", "mndmcookie_menu" );

// add shortcode
add_shortcode("mndmcookieoutput", "mndmcookie_shortcode_out" );

// admin menu output
function mndmcookie_menu(){
    add_menu_page('Cookie Checker', 'Cookie Checker', 'manage_options', 'mndmcookieadmin', 'mndmcookie_admin_out' );
}

function mndmcookie_admin_out(){
		?>
		<h2>Dumping current cookies available as Admin below</h2>
		<p>This is just a print_r of the $_COOKIE superglobal variable. Normally all the cookies will be visible here. To check a non-admin view use the shortcode [mndmcookieoutput] in a page.</p>
		<pre>
		<?php
		print_r($_COOKIE);
		?>
		</pre>
		<?php
}

// shortcode output
function mndmcookie_shortcode_out(){
		$output_cookie = "<pre>".print_r($_COOKIE,TRUE)."</pre>";
		return($output_cookie);
}



?>
