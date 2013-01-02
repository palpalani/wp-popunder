<?php
/*
Plugin Name: wp-popunder
Plugin URI: http://m3webware.com/wp-popunder
Description: Popunder plugin for WordPress created using Twitter Bootstrap modal and jQuery cookie plugin.
Version: 0.1
Author: palPalani, palani.p@gmail.com
Author URI: http://m3webware.com
License: GPL2
*/

function show_gwg_offers_css() {
    wp_register_style( 'bootstrap-modal', get_stylesheet_directory_uri() . '/bootstrap-modal.css', array(), '20130102', 'all' );  
    wp_enqueue_style( 'bootstrap-modal' );  
}
add_action( 'wp_enqueue_scripts', 'show_gwg_offers_css' );
function gwg_offer_js() {
	wp_enqueue_script('jquery-cookie', get_stylesheet_directory_uri() . '/js/jquery.cookie.js', array('jquery') );
	wp_enqueue_script('bootstrap-modal', get_stylesheet_directory_uri() . '/js/bootstrap-modal.min.js', array('jquery-cookie') );
}
function show_gwg_offer_content() {
    echo '<div class="modal hide fade" id="m3webware">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>5% course fee cash back offer from GWG this New Year onwards for India & UAE!!</h3>
  </div>
  <div class="modal-body">
    <p><img src="http://www.greenwgroup.com/wp-content/uploads/2013/01/gwg-offers.png" class="alignright" alt="">Green World Group proudly announces a 5% cash back offer of the course fees on all flavours of NEBOSH courses (IGC , ITC and IFC) for successful candidates who score a DISTINCTION.</p>
    <p>This offer is meant for candidates who on declaration of final result from NEBOSH score a distinction mark or above. Once the original mark lists are made available, GWG would reimburse 5% as cash back to all deserving candidates who qualify.</p>
    <p>...there\'s more... 2% course fee cash back for all successful candidates who score a CREDIT.</p>
    <p>Offer valid for students enrolled across all GWG institutions in UAE & India...!!! </p>
  </div>
  <div class="modal-footer">
	<a href="#" class="btn" id="m3webwareClose">Close</a>
	<small>* Conditions apply</small>
  </div>
</div>';
}
function show_gwg_offer_js() {
    echo '<script type="text/javascript">
    jQuery(window).load(function(){
	if( jQuery.cookie(\'GWGoffers\') === null ) {
	 var date = new Date();
	 var minutes = 60;
	 date.setTime(date.getTime() + (minutes * 60 * 1000));
	 jQuery.removeCookie(\'GWGoffers\', { path: \'/\' });
	 jQuery.cookie("GWGoffers", "palPalani", { expires: date, path: \'/\' });
         jQuery(\'#m3webware\').modal(\'show\');
	
	jQuery("#m3webwareClose").click(function () {
           jQuery("#m3webware").modal("hide");
         });
	}
    });
</script>';
}
add_action('wp_enqueue_scripts', 'gwg_offer_js');
add_action('wp_head', 'show_gwg_offer_js');
add_action('wp_footer', 'show_gwg_offer_content');