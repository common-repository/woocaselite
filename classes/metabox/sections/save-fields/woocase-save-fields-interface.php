<?php 

	interface woocaseSaveFieldsInterface{
		public function woocaseSaveFields($post_id);
	}

	require_once( plugin_dir_path( __FILE__ ) . 'woocase-save-general-fields.php');
	require_once( plugin_dir_path( __FILE__ ) . 'woocase-save-display-fields.php');
	require_once( plugin_dir_path( __FILE__ ) . 'woocase-save-shortcode-fields.php');
	require_once( plugin_dir_path( __FILE__ ) . 'woocase-save-premium-version-fields.php');