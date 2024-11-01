<?php 

	class woocaseDisplayFields implements woocaseFieldsInterface{
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
					<div class="woocase-single-field" id="woocase_post_settings_single">
						<!-- Woocase Post format -->
						<?php $woocase_post_option = get_post_meta( $post->ID, '_woocase_post_settings', true ); ?>
						 <label><?php _e( 'Post Settings:', 'woocasepro' ); ?></label>

						<select name="woocase_post_settings" class="woocase_post_settings_select">
							<option value="woocase-post-slider" <?php selected( $woocase_post_option, 'woocase-post-slider' ); ?>><?php _e( 'Slider', $this->textDomain ); ?></option>
							<option value="woocase-post-grid" <?php selected( $woocase_post_option, 'woocase-post-grid' ); ?>><?php _e( 'Grid', $this->textDomain ); ?></option>
							<option value="woocase-post-list" <?php selected( $woocase_post_option, 'woocase-post-list' ); ?>><?php _e( 'List', $this->textDomain ); ?></option>
						</select>
						<p><?php _e( 'Choose your preferred Variation of WooCase Showcase from the list.', 'woocasepro' ); ?></p>
					</div>

					<!-- Slider > Slider Type -->
					<div class="woocase-single-field" id="woocase_display_settings_single">
						<!-- Woocase Post format -->
						<?php $woocase_display_option = get_post_meta( $post->ID, '_woocase_slide_type_settings', true ); ?>
						 <label><?php _e( 'Slider Type:', 'woocasepro' ); ?></label>

						<select name="woocase_display_settings" class="woocase_display_settings_select">
							<option value="disabled-fullscreen" disabled="disabled"><?php _e( 'Full Screen/Hero Slide (Premium Only)', $this->textDomain ); ?></option>
						    <option value="woocase-carousel-slide" <?php selected( $woocase_display_option, 'woocase-carousel-slide' ); ?>><?php _e( 'Carousel Slide', $this->textDomain ); ?></option>
						    <option value="disabled-grid" disabled="disabled"><?php _e( 'Grid Slide (Premium Only)', $this->textDomain ); ?></option>
						    <option value="disabled-sidebar" disabled="disabled"><?php _e( 'Sidebar Slide (Premium Only)', $this->textDomain ); ?></option>
						</select>
						<p><?php _e( 'Choose your preferred WooCase slide type from the list.', 'woocasepro' ); ?></p>
					</div>
					<!-- End Slider > Slider Type -->

					<!-- Slider > Slider Type > Carousel Styles -->
						<div class="woocase-single-field" id="woocase_carousel_styles_settings_single">
							<!-- Woocase Post format -->
							<?php $woocase_carousel_style_option = get_post_meta( $post->ID, '_woocase_carousel_styles_settings', true ); ?>
							 <label><?php _e( 'Carousel Styles:', 'woocasepro' ); ?></label>

							<select name="woocase_carousel_styles_settings" class="woocase_carousel_styles_settings_select">
								<option value="woocase-carousel-classic-v1-style" <?php selected( $woocase_carousel_style_option, 'woocase-carousel-classic-v1-style' ); ?>><?php _e( 'Classic Slide V1', $this->textDomain ); ?></option>
								<option value="woocase-carousel-classic-v2-style" <?php selected( $woocase_carousel_style_option, 'woocase-carousel-classic-v2-style' ); ?>><?php _e( 'Classic Slide V2', $this->textDomain ); ?></option>

								<option value="disabled1" disabled="disabled"><?php _e( 'Center Focused Slide V1 (Premium Only)', $this->textDomain ); ?></option>
								<option value="disabled2" disabled="disabled"><?php _e( 'Center Focused Slide V2 (Premium Only)', $this->textDomain ); ?></option>
								<option value="disabled3" disabled="disabled"><?php _e( 'Carousel With Thumbnail Slider (Premium Only)', $this->textDomain ); ?></option>
								
							</select>
							<p><?php _e( 'Choose your preferred WooCase Carousel Style from the list.', 'woocasepro' ); ?></p>
						</div>
					<!-- End Slider > Slider Type > Carousel Styles -->


					<!-- gap -->

					<!-- Grid > Slider Type -->
					<div class="woocase-single-field" id="woocase_grid_type_settings_single">
						<!-- Woocase Post format -->
						<?php $woocase_grid_type_option = get_post_meta( $post->ID, '_woocase_grid_type_settings', true ); ?>
						 <label><?php _e( 'Grid Type:', 'woocasepro' ); ?></label>

						<select name="woocase_grid_type_settings" class="woocase_grid_type_settings_select">
							<option value="woocase-2-column-grid" <?php selected( $woocase_grid_type_option, 'woocase-2-column-grid' ); ?>><?php _e( '2 Column Grid', $this->textDomain ); ?></option>
							<option value="disabled-column3" disabled="disabled"><?php _e( '3 Column Grid (Premium Only)', $this->textDomain ); ?></option>
							<option value="woocase-4-column-grid" <?php selected( $woocase_grid_type_option, 'woocase-4-column-grid' ); ?>><?php _e( '4 Column Grid', $this->textDomain ); ?></option>

							<option value="disabled-mas-column2" disabled="disabled"><?php _e( '2 Column Masonary Grid (Premium Only)', $this->textDomain ); ?></option>
							<option value="disabled-mas-column3" disabled="disabled"><?php _e( '3 Column Masonary Grid (Premium Only)', $this->textDomain ); ?></option>
							<option value="disabled-mas-column4" disabled="disabled"><?php _e( '4 Column Masonary Grid (Premium Only)', $this->textDomain ); ?></option>
						</select>
						<p><?php _e( 'Choose your preferred WooCase Grid type from the list.', 'woocasepro' ); ?></p>
					</div>
					<!-- End Grid > Slider Type -->

					<!-- Grid > Slider Type > Grid Styles -->
						<div class="woocase-single-field" id="woocase_grid_column_styles_settings_single">
							<!-- Woocase Post format -->
							<?php $woocase_grid_column_style_option = get_post_meta( $post->ID, '_woocase_grid_column_styles_settings', true ); ?>
							 <label><?php _e( 'Grid Styles:', 'woocasepro' ); ?></label>

							<select name="woocase_grid_column_styles_settings" class="woocase_grid_column_styles_settings_select">
								<option value="woocase-grid-column-classic-v1" <?php selected( $woocase_grid_column_style_option, 'woocase-grid-column-classic-v1' ); ?>><?php _e( 'Classic V1', $this->textDomain ); ?></option>
								<option value="woocase-grid-column-classic-v2" <?php selected( $woocase_grid_column_style_option, 'woocase-grid-column-classic-v2' ); ?>><?php _e( 'Classic V2', $this->textDomain ); ?></option>
							</select>
							<p><?php _e( 'Choose your preferred WooCase Grid Style from the list.', 'woocasepro' ); ?></p>
						</div>
					<!-- End Grid > Slider Type > Grid Styles -->

					<!-- gap -->

					<!-- List > Slider Type -->
					<div class="woocase-single-field" id="woocase_list_type_settings_single">
						<!-- Woocase Post format -->
						<?php $woocase_list_type_option = get_post_meta( $post->ID, '_woocase_list_type_settings', true ); ?>
						 <label><?php _e( 'List Type:', 'woocasepro' ); ?></label>

						<select name="woocase_list_type_settings" class="woocase_list_type_settings_select">
							<option value="disabled-thumb" disabled="disabled"><?php _e( 'List With Full Thumb (Premium Only)', $this->textDomain ); ?></option>
							<option value="woocase-list-with-side-thumb" <?php selected( $woocase_list_type_option, 'woocase-list-with-side-thumb' ); ?>><?php _e( 'List With Side Thumb', $this->textDomain ); ?></option>
						</select>
						<p><?php _e( 'Choose your preferred WooCase list type from the list.', 'woocasepro' ); ?></p>
					</div>
					<!-- End List > Slider Type -->




					<!-- Auto Slide -->
						<div class="woocase-single-field" id="woocase_display_auto_slide_settings_single">
							<!-- Woocase Post format -->
							<?php $auto_slide_settings = get_post_meta( $post->ID, '_woocase_auto_slide_settings', true ); ?>

							 <label><?php _e( 'Auto Slide:', 'woocasepro' ); ?></label>
							
							<input type="checkbox" name="woocase_display_auto_slide_settings" id="woocase_display_auto_slide_settings" <?php checked( $auto_slide_settings, 1 ); ?>>
							<label class="woocase-checkbox-style-label" for="woocase_display_auto_slide_settings"></label>

							<p><?php _e( 'Turn ON/OFF Auto Slide for selected slider style.', 'woocasepro' ); ?></p>
						</div>
					<!-- End Auto Slide -->

					<!-- Navigation -->
						<div class="woocase-single-field" id="woocase_display_navigation_settings_single">
							<!-- Woocase Post format -->
							<?php $navigation_settings = get_post_meta( $post->ID, '_woocase_navigation_settings', true ); ?>
							 <label><?php _e( 'Navigation:', 'woocasepro' ); ?></label>

							<input type="checkbox" name="woocase_display_navigation_settings" id='woocase_display_navigation_settings' <?php checked( $navigation_settings, 1 ); ?>>
							<label class="woocase-checkbox-style-label" for="woocase_display_navigation_settings"></label>
							<p><?php _e( 'Turn ON/OFF Navigation for selected slider style.', 'woocasepro' ); ?></p>
						</div>
					<!-- End Navigation -->


					<!-- Pagination -->
						<div class="woocase-single-field" id="woocase_display_pagination_s_settings_single">
							<!-- Woocase Post format -->
							<?php $pagination_s_settings = get_post_meta( $post->ID, '_woocase_pagination_s_settings', true ); ?>
							 <label><?php _e( 'Pagination:', 'woocasepro' ); ?></label>

							<input type="checkbox" name="woocase_display_pagination_s_settings" id="woocase_display_pagination_s_settings" <?php checked( $pagination_s_settings, 1 ); ?>>
							<label class="woocase-checkbox-style-label" for="woocase_display_pagination_s_settings"></label>
							<p><?php _e( 'Turn ON/OFF Pagination for selected slider style.', 'woocasepro' ); ?></p>
						</div>
					<!-- End Pagination -->

					<!-- Slide Time -->
						<div class="woocase-single-field" id="woocase_display_slide_time_settings_single">
							<!-- Woocase Post format -->
							<?php $slide_time_settings = get_post_meta( $post->ID, '_woocase_slide_time_settings', true ); ?>
							 <label><?php _e( 'Slide Time:', 'woocasepro' ); ?></label>

							 <div class="woocase-slide-time-slider">
								<div></div>
								<span class="woocase-slide-time-count">0</span>
							</div>

							<input type="text" name="woocase_display_slide_time_settings" id="woocase_display_slide_time_settings" value="<?php echo esc_attr($slide_time_settings); ?>">
							<p><?php _e( 'Choose Time beetween each Slide.(1 to 5 Seconds)', 'woocasepro' ); ?></p>
						</div>
					<!-- End Slide Time -->

					<!-- Page Per Slide -->
						<div class="woocase-single-field" id="woocase_display_page_per_slide_settings">
								<?php $woocase_post_per_slide = get_post_meta( $post->ID, '_woocase_display_page_per_slide_settings', true ); ?>
								<label><?php _e( 'Post per Slide', 'woocasepro' ); ?></label>
								<div class="woocase-page-per-slide-slider">
									<div></div>
									<span class="woocase-page-per-slide-count">0</span>
								</div>
								
								<input type="text" name="woocase_display_page_per_slide_settings" id="woocase_display_page_per_slide_input" value="<?php echo esc_attr($woocase_post_per_slide); ?>">
								<p><?php _e( 'Choose How Many Posts you want to get per Slide.', 'woocasepro' ); ?></p>
							</div>
					<!-- End Page Per Slide -->


					<div id="woocase-pagination-nav">
							<a href="#" woocase-data-nav="prev" class="button button-primary button-large"><?php _e( 'Prev', 'woocasepro' ); ?></a>
					</div>

					


					
				<?php


			 
			    echo ob_get_clean();
		}

	}