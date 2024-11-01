<?php 

	class woocaseproListWithSideThumbStyle implements woocaseproViewInterface{

		public $query;

		public $woocase_args;

		public $version = 6;

		public $owl = false;

		public $openSans = false;

		// public static $owl =  0;
		/**
		 * Consturct
		 */
		public function __construct($query, Array $woocase_args = array()){
			$this->query = $query;
			$this->woocase_args = $woocase_args;
			$this->openSans = true;
		}

		/**
		 * Output
		 */
		public function woocase_view(){

			if($this->query->have_posts()) : ?>

					<!-- WooCase Carousel Version 6 -->
					<section class="woocase-carousel-default-css woocase-list-with-side-thumb-main-section section-padding">
						<div class="woocase-carousel-container">
							<?php while($this->query->have_posts()) : $this->query->the_post(); global $product; ?>

								<?php 
									$popup_class = '';
									$popup_data_post_id = '';
								?>

								<div class="woocase-single-list-with-side-thumb">
									<div class="woocase-left-single-list-with-side-thumb">
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
													<img src="<?php the_post_thumbnail_url('shop_thumbnail'); ?>" class="<?php echo esc_attr( $lumbu ); ?>" alt="Woocase product thumb">
												<?php
											} elseif($image_gallery && $image_gallery[0]){

												$image_size = wooCasePro::getImageSize(wp_get_attachment_image_src( $image_gallery[0], 'shop_thumbnail' )[0]);
											
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
													<img src="<?php echo wp_get_attachment_image_src( $image_gallery[0], 'shop_thumbnail' )[0]; ?>" class="<?php echo esc_attr($lumbu); ?>" alt="Woocase gallery thumb">
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
													<img src="<?php echo esc_attr( plugins_url('assets/images/woocase-no-thumb.jpg', dirname(__DIR__)) ); ?>" class="<?php echo esc_attr($lumbu); ?>" alt="Woocase No thumb">
												<?php
											}

											?>

									</div>

									<div class="woocase-right-single-list-with-side-thumb-content">
										<div class="woocase-list-with-side-thumb-title">
											<?php if(get_the_title()) : ?>
												<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
											<?php endif; ?>
										</div> <!-- ./End Title -->

										<div class="woocase-list-with-side-thumb-btn-list">
											<div class="woocase-carousel-btn-group">
												<div class="woocase-addToCart-btn">
													<?php if($product->get_type() === 'variable' || $product->get_type() === 'grouped') : ?>
														<a class="woocase-carousel-btn carousel-cart-ico-btn" href="<?php the_permalink(); ?>"><?php esc_attr_e( 'Select Options', 'woocasepro' ); ?></a>
													<?php else : ?>
														<a class="woocase-add-to-cart-btn <?php echo $product->get_stock_status(); ?> woocase-carousel-btn carousel-cart-ico-btn" href="<?php echo esc_attr( get_the_permalink() . '?add-to-cart=' . get_the_ID() ); ?>"></a>
													<?php endif; ?>
												</div>

												<div class="woocase-search-icon">
													<a href="<?php the_permalink(); ?>" class="<?php echo esc_attr( $popup_class ); ?>" <?php echo $popup_data_post_id; ?>>
														<img class="woocase-search-icon-img" src="<?php echo esc_attr( plugins_url('assets/images/woocase-search-icon.png', dirname(__DIR__)) ); ?>" alt="">
													</a>
												</div>
											</div>
										</div> <!-- ./End button -->
									</div>
									

									
								</div>
							<?php endwhile; ?>
						</div> <!-- .woocase-carousel-container END -->


					</section> <!-- .woocase-carousel-default-css .woocase-carousel-section .woocase-carousel-version-6 -->



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