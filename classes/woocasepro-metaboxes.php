<?php 

require_once( plugin_dir_path( __FILE__ ) . 'metabox/class-woocase-metabox.php');
require_once( plugin_dir_path( __FILE__ ) . 'metabox/sections/woocase-section-interface.php');
require_once( plugin_dir_path( __FILE__ ) . 'metabox/sections/fields/woocase-fields-interface.php');
require_once( plugin_dir_path( __FILE__ ) . 'metabox/sections/save-fields/woocase-save-fields-interface.php');

class woocaseproMetaboxes{
	public function woocaseAllSection(){
		return function(){
			new wooCaseProMetabox(new woocaseGeneralSettings(new woocaseGeneralFields, new woocaseSaveGeneralFields));
			new wooCaseProMetabox(new woocaseDisplaySettings(new woocaseDisplayFields, new woocaseSaveDisplayFields));
			new wooCaseProMetabox(new woocaseShortcodeSettings(new woocaseShortcodeFields, new woocaseSaveShortcodeFields));
			new wooCaseProMetabox(new woocasePremiumVersionSettings(new woocasePremiumVersionFields, new woocaseSavePremiumVersionFields));
		};
	}
}
