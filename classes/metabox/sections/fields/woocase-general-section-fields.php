<?php 

	class woocaseGeneralFields implements woocaseFieldsInterface{
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
					<div class="woocase-single-field" id="woocase_general_settings">
						<!-- Woocase Post format -->
						<?php $woocase_post_format = get_post_meta( $post->ID, '_woocase_general_settings', true ); ?>
						 <label><?php _e( 'Select Product Type:', 'woocasepro' ); ?></label>

						<select name="woocase_general_settings" class="woocase_general_settings_select">
							<option value="latest-product" <?php selected( $woocase_post_format, 'latest-product' ); ?>><?php _e( 'Latest Product', $this->textDomain ); ?></option>
						    <option value="featured-product" <?php selected( $woocase_post_format, 'featured-product' ); ?>><?php _e( 'Featured Product', $this->textDomain ); ?></option>
						    <option value="disabled-general1" disabled="disabled"><?php _e( 'Selected Product (Premium Only)', $this->textDomain ); ?></option>
						    <option value="disabled-general2" disabled="disabled"><?php _e( 'Popular Product (Premium Only)', $this->textDomain ); ?></option>
						    <option value="disabled-general3" disabled="disabled"><?php _e( 'Category Product (Premium Only)', $this->textDomain ); ?></option>
						</select>
						<p><?php _e( 'Choose your preferred WooCommerce product type from the list.', 'woocasepro' ); ?></p>
					</div>
				<?php 


					// Popular
					?>

						<div class="woocase-single-field" id="woocase_total_post_settings">
							<?php $total_post = get_post_meta( $post->ID, '_woocase_total_post_settings', true ); ?>
							<label><?php _e( 'Total post per page:', 'woocasepro' ); ?></label>
							<div class="woocase-total-post-slider">
								<div></div>
								<span class="woocase-total-post-count">0</span>
							</div>
							
							<input type="text" name="woocase_total_post_settings" id="woocase_total_post_settings_input" value="<?php echo esc_attr($total_post); ?>">
						</div>

						<div class="woocase-premium-access-image">
							<a href="https://codecanyon.net/item/woocasepro-woocommerce-product-slider-banner-carousel-grid-showcase/19811953?ref=pixiefy" target="_blank"><img src="<?php echo WOOCASE_PLUG_URL . 'assets/images/woocase-lite-premium-access.jpg' ?>" alt="Woocase Premium Access"></a>
						</div>


						
						<div id="woocase-pagination-nav">
							<a href="#" woocase-data-nav="next" class="button button-primary button-large"><?php _e( 'Next', 'woocasepro' ); ?></a>
						</div>



					<?php


			 
			    echo ob_get_clean();
		}

	}
