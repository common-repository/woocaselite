<?php 

	class woocaseShortcodeFields implements woocaseFieldsInterface{
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
				<div id="woocase_shortcode_settings_single">
					<!-- Woocase Post format -->
						<?php $shortcode_settings = get_post_meta( $post->ID, '_woocase_shortcode_settings', true ); ?>
						 <label><?php _e( 'Get Shortcode:', 'woocasepro' ); ?></label>

						 <input type="text" onfocus="this.select();" readonly="readonly" value="<?php if($post->post_status == "publish") {?>[woocaselite woocase_id=&quot;<?php echo $post->ID; ?>&quot; title=&quot;<?php echo get_the_title($post->ID); ?>&quot;]<?php } ?>" class="large-text code">
						<label class="woocase-shortcode-style-label" for="woocase_shortcode_settings"></label>
						<p><?php _e( 'Copy your shortcode from here.', 'woocasepro' ); ?></p>
					</div>
				<!-- End Popup -->
				<?php


			 
			    echo ob_get_clean();
		}
	}
