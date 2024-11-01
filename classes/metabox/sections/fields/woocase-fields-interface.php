<?php 

interface woocaseFieldsInterface{
	public function woocaseFields($post);
}

require_once( plugin_dir_path( __FILE__ ) . 'woocase-general-section-fields.php');
require_once( plugin_dir_path( __FILE__ ) . 'woocase-display-section-fields.php');
require_once( plugin_dir_path( __FILE__ ) . 'woocase-pagination-section-fields.php');
require_once( plugin_dir_path( __FILE__ ) . 'woocase-shortcode-section-fields.php');
require_once( plugin_dir_path( __FILE__ ) . 'woocase-premium-version-section-fields.php');