<?php
/**
 * Plugin Name: Seat Booking
 * Plugin URI: http://nilansanjaya.com/
 * Description: This plugin can be used to book seats
 * Version: 1.0.0
 * Author: Nilan Sanjaya
 * Author URI: http://nilansanjaya.com
 * License: GPL2
 */

define('NSSB_URL', plugins_url('/', __FILE__));
define('NSSB_AJAX', plugins_url('/ajax-handler.php', __FILE__));

require_once('ns-seat-booking-functions.php');

add_action('init', 'nssb_init');
//add_action( 'wp_head', 'nssb_head' );
add_action('the_content', 'nssb_front_content');
 
/* add a custom tab to show user pages */
add_filter('um_profile_tabs', 'pages_tab', 1000 );
function pages_tab( $tabs ) {
	$tabs['pages'] = array(
		'name' => 'Booking History',
		'icon' => 'um-faicon-pencil',
		'custom' => true
	);	
	return $tabs;
}

/* Tell the tab what to display */
add_action('um_profile_content_pages_default', 'um_profile_content_pages_default');
function um_profile_content_pages_default( $args ) {
	
	echo ns_show_booking_history();

}

/*id
user_id
train_data
departure_on
departure_from
arrival_on
arrival_from
seats
payment_type
booking_date*/

?>