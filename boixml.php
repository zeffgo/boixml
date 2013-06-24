<?php
   /*
   Plugin Name: Bank of Israel rates table
   Description: gets currency rates from bank of israel
   Author: zeff
   Version: 1.0
   License: GPL2
   */

	register_activation_hook( __FILE__, function() {
	  add_option('Activated_Plugin','Plugin-Slug');
	  /* activation code here */
	});


	function getxml( $atts ){
	 include 'getxml.php';
	}
	add_shortcode( 'boixml', 'getxml' );
?>