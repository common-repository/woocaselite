<?php 

	interface woocaseproViewInterface{
		public function __construct($query, Array $woocase_args = array());
		public function woocase_view();
		public function woocase_view_scripts();
		public function woocase_view_styles();
	}


	require_once( plugin_dir_path( __FILE__ ) . 'woocase-carousel-classic-v1-style.php');
	require_once( plugin_dir_path( __FILE__ ) . 'woocase-carousel-classic-v2-style.php');
	require_once( plugin_dir_path( __FILE__ ) . 'woocase-grid-column-v1-style.php');
	require_once( plugin_dir_path( __FILE__ ) . 'woocase-grid-column-v2-style.php');
	require_once( plugin_dir_path( __FILE__ ) . 'woocase-list-with-side-thumb-style.php');