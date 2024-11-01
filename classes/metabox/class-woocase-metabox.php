<?php 

class wooCaseProMetabox{
	/**
	 * Woocasepro Version
	 */
	public $ver = '1.0';

	/**
	 * Woocasepro Text Domain
	 */
	public $textDomain = 'woocasepro';

	public $woocaseSection;

	/**
	 * Constructor
	 */
	public function __construct(woocaseSectionInterface $woocaseSection){
		add_action( 'add_meta_boxes', array( $this, 'wooCasePro_metaboxes_init' ) );
		add_action('save_post', array( $this, 'wooCasePro_save_metabox' ));

		$this->woocaseSection = $woocaseSection;
	}

	/**
	 * Metaboxes Init
	 */
	public function wooCasePro_metaboxes_init(){
		$this->woocaseSection->woocase_add_meta_box($this);
	}

	public function woocase_general_settings_callback( $post ){
		$this->woocaseSection->woocase_settings_callback($post);
	}

	public function wooCasePro_save_metabox($post_id){ 
		$this->woocaseSection->woocase_save_metabox($post_id);
	}


}