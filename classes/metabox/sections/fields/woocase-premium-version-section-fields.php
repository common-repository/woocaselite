<?php 

	class woocasePremiumVersionFields implements woocaseFieldsInterface{
		/**
		 * Woocasepro Version
		 */
		public $ver = '1.0';

		/**
		 * Woocasepro Text Domain
		 */
		public $textDomain = 'woocasepro';
		
		public function woocaseFields($post){
			ob_start();

				?>
				<!-- Popup -->
				<div id="woocase_premium_version_settings_single">
					<!-- Woocase Post format -->
						 <label><?php _e( 'Get Premium Version:', 'woocasepro' ); ?></label>

						 <a class="woocase-premium-version-btn" href="https://codecanyon.net/item/woocasepro-woocommerce-product-slider-banner-carousel-grid-showcase/19811953?ref=pixiefy" target="_blank"><?php _e( 'Get Premium Version', 'woocasepro' ); ?></a>
				</div>
				<!-- End Popup -->
				<?php


			 
			    echo ob_get_clean();
		}
	}
