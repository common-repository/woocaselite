<?php 

interface woocaseSectionInterface{
	public function __construct(woocaseFieldsInterface $woocaseFields, woocaseSaveFieldsInterface $woocaseSaveFields);
	public function woocase_add_meta_box($thisM);
	public function woocase_settings_callback($post);
	public function woocase_save_metabox($post_id);
}

require_once( plugin_dir_path( __FILE__ ) . 'woocase-general-settings.php');
require_once( plugin_dir_path( __FILE__ ) . 'woocase-display-settings.php');
require_once( plugin_dir_path( __FILE__ ) . 'woocase-shortcode-settings.php');
require_once( plugin_dir_path( __FILE__ ) . 'woocase-premium-version-settings.php');