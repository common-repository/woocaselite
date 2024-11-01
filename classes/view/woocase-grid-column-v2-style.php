<?php 

	class woocaseproGridColumnV2Style implements woocaseproViewInterface{

		public $query;

		public $woocase_args;

		public $version = 8;

		public $owl = false;

		public $openSans = false;
		
		public $woo_image_loaded = false;

		public $gridColumn;
		
		/**
		 * Consturct
		 */
		public function __construct($query, Array $woocase_args = array()){
			$this->query = $query;
			$this->woocase_args = $woocase_args;
			$this->openSans = true;
			$this->woo_image_loaded = true;
		}

		/**
		 * Output
		 */
		public function woocase_view(){

			if($this->query->have_posts()) : ?>
				<?php 
					if($this->woocase_args['woocase_type'] === 'woocase-2-column-grid'){
						$this->gridColumn = 'woocase-2-grid-column';
					} elseif($this->woocase_args['woocase_type'] === 'woocase-4-column-grid'){
						$this->gridColumn = 'woocase-4-grid-column';
					}
				?>

					<!-- WooCase Carousel Version 4 -->
					<?php if($this->woocase_args['woocase_ajax'] === false) : ?>
					<section class="woocase-carousel-default-css woocase-carousel-section woocase-carousel-version-6 <?php echo esc_attr( $this->gridColumn ); ?> woocase-grid-colomn-sp-v2 section-padding">
						<div class="woocase-carousel-container">
					<?php endif; ?>
								<?php while($this->query->have_posts()) : $this->query->the_post(); global $product; ?>

									<div class="woocase-grid-column-single-item">
										<div class="woocase-carousel-single-item">
											<figure class="woocase-carousel-elements">
												<div class="woocase-carousel-thumb">

													<?php 
														$popup_class = '';
														$popup_data_post_id = '';
														$popup_text = '';
													?>


													<?php 
														$image_gallery = explode(',', get_post_meta( get_the_ID(), '_product_image_gallery', true ));

														if(has_post_thumbnail( )) {

															$image_size = wooCasePro::getImageSize(get_the_post_thumbnail_url());
														
															if( $image_size ) {
																if($image_size['width'] < $image_size['height']) {
																	$lumbu = 'woocase-lombu-thumb';
																} else {
																	$lumbu = 'woocase-simple-thumb';
																}
															} else {
																$lumbu = '';
															}

															?>
																<img src="<?php the_post_thumbnail_url('shop_single'); ?>" class="<?php echo esc_attr( $lumbu ); ?>" alt="Woocase product thumb">
															<?php
														} elseif($image_gallery && $image_gallery[0]){

															$image_size = wooCasePro::getImageSize(wp_get_attachment_image_src( $image_gallery[0], 'full-thumb' )[0]);
														
															if( $image_size ) {
																if($image_size['width'] < $image_size['height']) {
																	$lumbu = 'woocase-lombu-thumb';
																} else {
																	$lumbu = 'woocase-simple-thumb';
																}
															} else {
																$lumbu = '';
															}

															?>
																<img src="<?php echo wp_get_attachment_image_src( $image_gallery[0], 'shop_single' )[0]; ?>" class="<?php echo esc_attr($lumbu); ?>" alt="Woocase gallery thumb">
															<?php
														} else {
															$image_size = wooCasePro::getImageSize(plugins_url('assets/images/woocase-no-thumb.jpg', dirname(__DIR__)));
														
															if( $image_size ) {
																if($image_size['width'] < $image_size['height']) {
																	$lumbu = 'woocase-lombu-thumb';
																} else {
																	$lumbu = 'woocase-simple-thumb';
																}
															} else {
																$lumbu = '';
															}
															

															?>
																<img src="<?php echo esc_attr( plugins_url('assets/images/woocase-no-thumb.jpg', dirname(__DIR__)) ); ?>" class="<?php echo esc_attr($lumbu); ?> wooCasePro-no-thumb" alt="Woocase No thumb">
															<?php
														}

														?>
												</div>
												
												<figcaption class="woocase-carousel-text-content">
													<div class="woocase-addToCart-btn">
														<?php if($product->get_type() === 'variable' || $product->get_type() === 'grouped') : ?>
															<a class="woocase-carousel-btn carousel-cart-ico-btn" href="<?php the_permalink(); ?>"><?php esc_attr_e( 'Select Options', 'woocasepro' ); ?></a>
														<?php else : ?>
															<a class="woocase-add-to-cart-btn <?php echo $product->get_stock_status(); ?> woocase-carousel-btn carousel-cart-ico-btn" href="<?php echo esc_url( get_the_permalink() . '?add-to-cart=' . get_the_ID() ); ?>"><?php esc_attr_e( 'Add to cart', 'woocasepro' ); ?></a>
														<?php endif; ?>
													</div>
												</figcaption> <!-- .woocase-carousel-text-content END -->
											
											</figure> <!-- .woocase-carousel-elements END -->
											<div class="woocase-carouselelements-footer">

												<?php if(get_the_title()) : ?>
													<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
												<?php endif; ?>
												
												<?php
												$excerpt_original = trim(get_the_excerpt( ));
												 if($excerpt_original) {
													echo wpautop( substr(esc_html(get_the_excerpt( )),0, 80) );
												} else{
													echo wpautop( substr(esc_html(get_the_content( )),0, 80) );
												} ?>

												<a href="<?php the_permalink(); ?>" <?php echo $popup_data_post_id; ?> class="woocase-carousel-btn woocase-carousel-black-btn <?php echo esc_attr( $popup_class ); ?>"><?php echo ($popup_text) ? esc_attr($popup_text) : esc_attr__( 'Read More', 'woocasepro' ); ?></a>
											</div>
										</div>
									</div>
									
			
								<?php endwhile; ?>
					<?php if($this->woocase_args['woocase_ajax'] === false) : ?>
						

						</div> <!-- .woocase-carousel-container END -->

						<div class="woocase-load-more-button">
							<a href="#" woocase-data-load-more-id="<?php echo esc_attr( $this->woocase_args['woocase_id'] ); ?>" woocase-data-load-more="<?php echo esc_attr( $this->woocase_args['woocase_type'] ); ?>"><?php esc_attr_e( 'Load More', 'woocasepro' ); ?></a>
						</div>
					</section> <!-- .woocase-carousel-default-css .woocase-carousel-section .woocase-carousel-version-4 -->
					<?php endif; ?>




			<?php endif;
			wp_reset_query();
			wp_reset_postdata();
		}

		/**
		 * Load Scripts
		 */
		public function woocase_view_scripts(){

		}

		/**
		 * Load Styles
		 */
		public function woocase_view_styles(){

			wp_enqueue_style( 'woocase-carousel-style', esc_attr( plugins_url('assets/css/carousel-style.css', dirname(__DIR__)) ), array(), '1.0', 'all' );

		    
		}
	}