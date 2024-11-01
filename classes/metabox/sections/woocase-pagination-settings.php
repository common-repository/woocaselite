<?php 

	
	
	class woocasePaginationSettings implements woocaseSectionInterface{
		/**
		 * Woocasepro Version
		 */
		public $ver = '1.0';

		/**
		 * Woocasepro Text Domain
		 */
		public $textDomain = 'woocasepro';

		public $woocaseFields;

		public $woocaseSaveFields;

		public function __construct(woocaseFieldsInterface $woocaseFields, woocaseSaveFieldsInterface $woocaseSaveFields){
			$this->woocaseFields = $woocaseFields;
			$this->woocaseSaveFields = $woocaseSaveFields;
		}


		public function woocase_add_meta_box($thisM){
			return add_meta_box( 
				'woocase_pagination_settings', 
				__( 'Woocase pagination settings', $thisM->textDomain ),
				 array( $thisM, 'woocase_general_settings_callback' ),
				'woocasepro',
				'normal',
				'low'
	        );
		}

		public function woocase_settings_callback($post){
			$this->woocaseFields->woocaseFields($post);
		}

		public function woocase_save_metabox($post_id){
			$this->woocaseSaveFields->woocaseSaveFields($post_id);
		}

	}