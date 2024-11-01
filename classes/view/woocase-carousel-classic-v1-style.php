<?php 

	class woocaseproCarouselClassicV1Style implements woocaseproViewInterface{

		public $query;

		public $woocase_args;

		public $version = 7;

		public $owl = false;

		public $openSans = false;
		
		/**
		 * Consturct
		 */
		public function __construct($query, Array $woocase_args = array()){
			$this->query = $query;
			$this->woocase_args = $woocase_args;
			$this->owl = true;
			$this->openSans = true;
		}

		/**
		 * Output
		 */
		public function woocase_view(){

			if($this->query->have_posts()) : ?>

					<!-- WooCase Carousel Version 7 -->
					<section class="woocase-carousel-default-css woocase-carousel-section woocase-carousel-version-7 section-padding">
						<div class="woocase-carousel-container">
							<div class="owl-carousel owl-theme woocase-carousel-classic-version-unique-1">
								<?php while($this->query->have_posts()) : $this->query->the_post(); global $product; ?>
									<div class="item">
										<figure class="woocase-carousel-elements">

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
											
											<figcaption class="woocase-carousel-text-content">
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

												<div class="woocase-carousel-btn-group">
													<div class="woocase-addToCart-btn">
														<?php if($product->get_type() === 'variable' || $product->get_type() === 'grouped') : ?>
															<a class="woocase-carousel-btn carousel-cart-ico-btn" href="<?php the_permalink(); ?>"><?php esc_attr_e( 'Select Options', 'woocasepro' ); ?></a>
														<?php else : ?>
															<a class="woocase-add-to-cart-btn <?php echo $product->get_stock_status(); ?> woocase-carousel-btn carousel-cart-ico-btn" href="<?php echo esc_url( get_the_permalink() . '?add-to-cart=' . get_the_ID() ); ?>"><?php esc_attr_e( 'Add to cart', 'woocasepro' ); ?></a>
														<?php endif; ?>
													</div>
													<a href="<?php the_permalink(); ?>" <?php echo $popup_data_post_id; ?> class="woocase-carousel-btn woocase-carousel-border-btn <?php echo esc_attr( $popup_class ); ?>"><?php echo ($popup_text) ? esc_attr($popup_text) : esc_attr__( 'Read More', 'woocasepro' ); ?></a>
												</div>
											</figcaption> <!-- .woocase-carousel-text-content END -->
											
										</figure> <!-- .woocase-carousel-elements END -->
									</div>
								<?php endwhile; ?>
							</div> <!-- .woocase-carousel-slider END -->
							<?php if($this->woocase_args['woocase_navigation']) : ?>
								<div class="customNavigation">
									<a class="next"><img src="<?php echo esc_attr( plugins_url('assets/images/carousel-next-arrow.png', dirname(__DIR__)) ); ?>" alt=""></a>
									<a class="prev"><img src="<?php echo esc_attr( plugins_url('assets/images/carousel-prev-arrow.png', dirname(__DIR__)) ); ?>" alt=""></a>
								</div>
							<?php endif; ?>
						</div> <!-- .woocase-carousel-container END -->
					</section> <!-- .woocase-carousel-default-css .woocase-carousel-section .woocase-carousel-version-7 -->


					<script type="text/javascript">

							(function(){
								jQuery(document).on('ready', function(){
									jQuery(".woocase-carousel-classic-version-unique-1").each(function(){
									    var $this = jQuery(this);

									    $this.owlCarousel({
									        nav: false,
									        slideSpeed : 300,
									        paginationSpeed : 400,
									        items: <?php echo (empty($this->woocase_args['woocase_page_per_slide'])) ? esc_attr( '3' ) : esc_attr( $this->woocase_args['woocase_page_per_slide'] ); ?>,
									        loop:true,
									        touchDrag: true,
									        mouseDrag: true,
									        autoplay : <?php echo (empty($this->woocase_args['woocase_auto_slide'])) ? esc_attr( 'false' ) : esc_attr( $this->woocase_args['woocase_auto_slide'] ); ?>,
											autoplayTimeout: <?php echo (empty($this->woocase_args['woocase_slide_time'])) ? esc_attr( '1000' ) : esc_attr( $this->woocase_args['woocase_slide_time'] * 1000 ); ?>,
									        dots: <?php echo (empty($this->woocase_args['woocase_pagination_settings'])) ? esc_attr( 'false' ) : esc_attr( $this->woocase_args['woocase_pagination_settings'] ); ?>,
									        responsiveClass: true,
									        autoplayHoverPause: true,
									        responsiveBaseElement: $this.closest('.woocase-carousel-default-css'),
										    responsive:{
										        0:{
										            items:1
										        },
										        479:{
										            items:2
										        },
										        700:{
										            items:3
										        },
										        990:{
										            items:<?php echo (empty($this->woocase_args['woocase_page_per_slide'])) ? esc_attr( '3' ) : esc_attr( $this->woocase_args['woocase_page_per_slide'] ); ?>
										        }

										    }
									    });
									    $this.next().find('.prev').on('click',function () {
									        $this.trigger('prev.owl.carousel');
									    });

									   	$this.next().find('.next').on('click',function () {
									        $this.trigger('next.owl.carousel');
									    });
								    });
								});
							}());
							
					</script>


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