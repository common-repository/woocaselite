(function($){

	'use strict';

	jQuery(document).on('ready', function(){
		// prepend dashboard nav
		jQuery('#woocase_general_settings').before('<div id="woocase-metabox-nav"><ul><li class="woocase-active"><a href="#" woocase-data-settings="woocase-general">General Settings</a></li><li><a href="#" woocase-data-settings="woocase-display">Display Settings</a></li></ul></div>	')


		//  Color Picker
		jQuery('#woocase_background_image_color_input').wpColorPicker();
		jQuery('#woocase_sale_tag_bgc_input').wpColorPicker({ defaultColor: true });
		jQuery('#woocase_featured_tag_bgc_input').wpColorPicker({  defaultColor: true });



		// Select
		jQuery('select').select2();

		// Slider
		jQuery( ".woocase-total-post-slider > div" ).slider({
			value: jQuery('#woocase_total_post_settings_input').val(  ),
			range: "min",
			max: 50,
			min: 2,
			slide: function( event, ui ) {
		        jQuery('#woocase_total_post_settings_input').val( ui.value );
		        jQuery('.woocase-total-post-slider > span.woocase-total-post-count').text( ui.value );
		     }
		});
		jQuery('.woocase-total-post-slider > span.woocase-total-post-count').text( (jQuery('#woocase_total_post_settings_input').val() !== "" ? jQuery('#woocase_total_post_settings_input').val() : 2) );

		// 
		jQuery( ".woocase-slide-time-slider > div" ).slider({
			value: jQuery('#woocase_display_slide_time_settings').val(  ),
			range: "min",
			max: 5,
			min: 1,
			slide: function( event, ui ) {
		        jQuery('#woocase_display_slide_time_settings').val( ui.value );
		        jQuery('.woocase-slide-time-slider > span.woocase-slide-time-count').text( ui.value );
		     }
		});
		jQuery('.woocase-slide-time-slider > span.woocase-slide-time-count').text( (jQuery('#woocase_display_slide_time_settings').val() !== "" ? jQuery('#woocase_display_slide_time_settings').val() : 1) );
		// Slider Container Width
		var woocase_slider_container_width_default = jQuery('#woocase_display_slider_container_width_settings').val(  );

		if(woocase_slider_container_width_default === ''){
			woocase_slider_container_width_default = 800;
		}
		jQuery( ".woocase-slider-container-width-slider > div" ).slider({
			value: woocase_slider_container_width_default,
			range: "min",
			max: 1170,
			min: 300,
			slide: function( event, ui ) {
		        jQuery('#woocase_display_slider_container_width_settings').val( ui.value );
		        jQuery('.woocase-slider-container-width-slider > span.woocase-slider-container-width-count').text( ui.value );
		     }
		});
		jQuery('.woocase-slider-container-width-slider > span.woocase-slider-container-width-count').text( (jQuery('#woocase_display_slider_container_width_settings').val() !== "" ? jQuery('#woocase_display_slider_container_width_settings').val() : 800) );
		jQuery('#woocase_display_slider_container_width_settings').val( 800 );

		// 

		var woocase_page_per_slide_default = jQuery('#woocase_display_page_per_slide_input').val();

		if(woocase_page_per_slide_default === ''){
			woocase_page_per_slide_default = 3;
		}

		jQuery( ".woocase-page-per-slide-slider > div" ).slider({
			value: woocase_page_per_slide_default,
			range: "min",
			max: 6,
			min: 2,
			slide: function( event, ui ) {
		        jQuery('#woocase_display_page_per_slide_input').val( ui.value );
		        jQuery('.woocase-page-per-slide-slider > span.woocase-page-per-slide-count').text( ui.value );
		     }
		});
		jQuery('.woocase-page-per-slide-slider > span.woocase-page-per-slide-count').text( (jQuery('#woocase_display_page_per_slide_input').val() !== "" ? jQuery('#woocase_display_page_per_slide_input').val() : 3) );



		// Append Pagination
		jQuery('#woocase-pagination-nav a').on('click', function(e){
			e.preventDefault();
			
			

			if(jQuery(this).attr('woocase-data-nav') === "next"){
				if(jQuery('#woocase-product-list li.select2-selection__choice').length <= 0 && jQuery('.woocase_general_settings_select').val() === 'selected-product'){
					if(jQuery('p.woocase-error').length <=0){
						jQuery('#woocase-product-list p').before('<p class="woocase-error">This Field can not be empty</p>');
					}
					return false;
				}else {
					jQuery('#woocase-product-list p.woocase-error').remove();
				}

				jQuery('#woocase_general_settings').hide();
				jQuery('#woocase_display_settings').fadeIn();

				jQuery('div#woocase-metabox-nav ul li').removeClass('woocase-active');
				jQuery('div#woocase-metabox-nav ul li a[woocase-data-settings="woocase-display"]').closest('li').addClass('woocase-active');
			}

			if(jQuery(this).attr('woocase-data-nav') === "prev"){
				jQuery('#woocase_general_settings').fadeIn();
				jQuery('#woocase_display_settings').hide();

				jQuery('div#woocase-metabox-nav ul li').removeClass('woocase-active');
				jQuery('div#woocase-metabox-nav ul li a[woocase-data-settings="woocase-general"]').closest('li').addClass('woocase-active');
			}
		});

		// Post Settings After Load

		// IF Slider
		if(jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider'){
			jQuery('div#woocase_display_settings_single').slideDown();

			if(jQuery('.woocase_display_settings_select').val() === 'woocase-fullscreen-slide'){
				jQuery('div#woocase_fullscreen_styles_settings_single').slideDown();
			}

			if(jQuery('.woocase_display_settings_select').val() === 'woocase-carousel-slide'){
				jQuery('div#woocase_carousel_styles_settings_single').slideDown();
			}else{
				jQuery('div#woocase_carousel_styles_settings_single').hide();
			}

			if(jQuery('.woocase_display_settings_select').val() === 'woocase-grid-slide'){
				jQuery('div#woocase_grid_styles_settings_single').slideDown();
			}else{
				jQuery('div#woocase_grid_styles_settings_single').hide();
			}

			if(jQuery('.woocase_display_settings_select').val() === 'woocase-sidebar-slide'){
				jQuery('div#woocase_sidebar_styles_settings_single').slideDown();
			}else{
				jQuery('div#woocase_sidebar_styles_settings_single').hide();
			}
		} else{
			jQuery('div#woocase_display_settings_single, div#woocase_fullscreen_styles_settings_single, div#woocase_carousel_styles_settings_single, div#woocase_grid_styles_settings_single, div#woocase_sidebar_styles_settings_single').slideUp();
		}
		// IF End Slider

		// IF Grid
		if(jQuery('.woocase_post_settings_select').val() === 'woocase-post-grid'){
			jQuery('div#woocase_grid_type_settings_single').slideDown();
			jQuery('div#woocase_grid_column_styles_settings_single').slideDown();
		} else{
			jQuery('div#woocase_grid_type_settings_single, div#woocase_grid_column_styles_settings_single').hide();
		}
		// End IF Grid

		// IF List
		if(jQuery('.woocase_post_settings_select').val() === 'woocase-post-list'){
			jQuery('div#woocase_list_type_settings_single').slideDown();
		} else{
			jQuery('div#woocase_list_type_settings_single').hide();
		}
		// End IF List

		// Post Settings on Change
		jQuery('.woocase_post_settings_select').on('change', function(){

			// IF Slider
				if(jQuery(this).val() === 'woocase-post-slider'){
					jQuery('div#woocase_display_settings_single').slideDown();

					// Full Screen Slide
					if(jQuery('.woocase_display_settings_select').val() === 'woocase-fullscreen-slide'){
						jQuery('div#woocase_fullscreen_styles_settings_single').slideDown();
					}

					// Carousel Slide
					if(jQuery('.woocase_display_settings_select').val() === 'woocase-carousel-slide'){
						jQuery('div#woocase_carousel_styles_settings_single').slideDown();
					}else{
						jQuery('div#woocase_carousel_styles_settings_single').hide();
					}
					// Grid Slide
					if(jQuery('.woocase_display_settings_select').val() === 'woocase-grid-slide'){
						jQuery('div#woocase_grid_styles_settings_single').slideDown();
					}else{
						jQuery('div#woocase_grid_styles_settings_single').hide();
					}

					// Sidebar Slide
					if(jQuery('.woocase_display_settings_select').val() === 'woocase-sidebar-slide'){
						jQuery('div#woocase_sidebar_styles_settings_single').slideDown();
					}else{
						jQuery('div#woocase_sidebar_styles_settings_single').hide();
					}
				} else{
					jQuery('div#woocase_display_settings_single, div#woocase_fullscreen_styles_settings_single, div#woocase_carousel_styles_settings_single, div#woocase_grid_styles_settings_single, div#woocase_sidebar_styles_settings_single').hide();
				}
			// End IF Slider

			// IF Grid
				if(jQuery(this).val() === 'woocase-post-grid'){
					jQuery('div#woocase_grid_type_settings_single').slideDown();
					jQuery('div#woocase_grid_column_styles_settings_single').slideDown();
				} else{
					jQuery('div#woocase_grid_type_settings_single, div#woocase_grid_column_styles_settings_single').hide();
				}
			// End IF Grid

			// IF List
				if(jQuery(this).val() === 'woocase-post-list'){
					jQuery('div#woocase_list_type_settings_single').slideDown();
				} else{
					jQuery('div#woocase_list_type_settings_single').hide();
				}
			// End IF List
		});

		// Fullscreen Slider Style
		jQuery('.woocase_display_settings_select').on('change', function(){
			
			// Full Screen Slide
			if(jQuery(this).val() === 'woocase-fullscreen-slide'){
				jQuery('div#woocase_fullscreen_styles_settings_single').slideDown();
			} else{
				jQuery('div#woocase_fullscreen_styles_settings_single').hide();
			}

			//	Carousel Slide
			if(jQuery(this).val() === 'woocase-carousel-slide'){
				jQuery('div#woocase_carousel_styles_settings_single').slideDown();
			}else{
				jQuery('div#woocase_carousel_styles_settings_single').hide();
			}

			// Grid Slide
			if(jQuery(this).val() === 'woocase-grid-slide'){
				jQuery('div#woocase_grid_styles_settings_single').slideDown();
			}else{
				jQuery('div#woocase_grid_styles_settings_single').hide();
			}

			// Sidebar Slide
			if(jQuery(this).val() === 'woocase-sidebar-slide'){
				jQuery('div#woocase_sidebar_styles_settings_single').slideDown();
			}else{
				jQuery('div#woocase_sidebar_styles_settings_single').hide();
			}
		});

		// Selected Post

		if(jQuery('.woocase_general_settings_select').val() === 'selected-product'){
			jQuery('#woocase-product-list').css('display', 'block');
			jQuery('div#woocase_total_post_settings').css('display', 'none');
		}

		jQuery('.woocase_general_settings_select').on('change', function(){
			jQuery('#woocase-product-list').slideUp();

			// jQuery('#woocase-product-list li.select2-selection__choice').remove();
			// jQuery("#woocase-product-list option").prop("selected", false);
			jQuery('div#woocase_total_post_settings').css('display', 'block');

			if( jQuery(this).val() === 'selected-product'){
				jQuery('#woocase-product-list').slideDown();
				jQuery('div#woocase_total_post_settings').css('display', 'none');
			}
			
		});

		// Category

		if(jQuery('.woocase_general_settings_select').val() === 'category-product'){
			jQuery('#woocase-category-list').css('display', 'block');
		}

		jQuery('.woocase_general_settings_select').on('change', function(){
			jQuery('div#woocase-category-list').slideUp();

			// jQuery('div#woocase-category-list li.select2-selection__choice').remove();
			// jQuery("div#woocase-category-list option").prop("selected", false);
			// jQuery('div#woocase_total_post_settings').css('display', 'block');

			if( jQuery(this).val() === 'category-product'){
				jQuery('div#woocase-category-list').slideDown();
			}
			
		});

		// Popular Product
		if(jQuery('.woocase_general_settings_select').val() === 'popular-product'){
			jQuery('#woocase_popular_order_settings').css('display', 'block');
		}
		jQuery('.woocase_general_settings_select').on('change', function(){
			jQuery('#woocase_popular_order_settings').slideUp();

			// jQuery("#woocase_popular_order_settings .select2-selection__rendered").text('View');
			// jQuery(".woocase_popular_order_settings_select option[value='popular-view']").prop("selected", 'selected');

			if( jQuery(this).val() === 'popular-product'){
				jQuery('#woocase_popular_order_settings').slideDown();
			}


			
		});

		// 
		jQuery('#woocase-product-list select').on('change', function(){
			jQuery('#woocase-product-list p.woocase-error').remove();
		});

		// 
		jQuery('div#woocase-metabox-nav ul li a').on('click', function(e){
			e.preventDefault();
			jQuery('div#woocase-metabox-nav ul li').removeClass('woocase-active');
			jQuery(this).parent('li').addClass('woocase-active');


			if(jQuery(this).attr('woocase-data-settings') === "woocase-general"){
				
				jQuery('#woocase_general_settings').fadeIn();
				jQuery('#woocase_display_settings').hide();
			}

			if(jQuery(this).attr('woocase-data-settings') === "woocase-display"){
				jQuery('#woocase_general_settings').hide();
				jQuery('#woocase_display_settings').fadeIn();
			}


		});


		// 
		// if( jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-fullscreen-slide' && (jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-classic-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-modern-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-minimal-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-flat-style')){
		// 	jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single').slideDown();
		// } else {
		// 	jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single').hide();
		// }

		// jQuery('.woocase_post_settings_select, .woocase_display_settings_select, .woocase_fullscreen_styles_settings_select').on('change', function(){
			

		// 	if( jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-fullscreen-slide' && (jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-classic-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-modern-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-minimal-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-flat-style')){
		// 		jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single').slideDown();
		// 	} else {
		// 		jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single').hide();
		// 	}

		// })

		if( jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-fullscreen-slide' && (jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-classic-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-modern-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-minimal-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-flat-style')){
			jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single,div#woocase_image_upload_single, div#woocase_background_image_color_settings').fadeIn();
			jQuery('div#woocase_display_page_per_slide_settings, div#woocase_display_pagination_s_settings_single').hide();
		} else {
			jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single, div#woocase_display_pagination_s_settings_single, div#woocase_display_page_per_slide_settings,div#woocase_image_upload_single, div#woocase_background_image_color_settings').hide();
		}
		
		if((jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-carousel-slide') && (jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-center-focused-v1-style' || jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-center-focused-v2-style')){
			jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single, div#woocase_display_pagination_s_settings_single, div#woocase_display_slider_container_width_settings_single').fadeIn();
			jQuery('div#woocase_display_page_per_slide_settings').hide();
		} else if((jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-carousel-slide') && (jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-classic-v1-style' || jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-classic-v2-style' || jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-with-thumbnail-slider-style')){
			jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single, div#woocase_display_pagination_s_settings_single, div#woocase_display_page_per_slide_settings').fadeIn();

			if(jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-with-thumbnail-slider-style'){
				jQuery('div#woocase_display_page_per_slide_settings').hide();
			}
		} else if((jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-sidebar-slide')){
				jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single, div#woocase_display_pagination_s_settings_single').fadeIn();
		} else if((jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-grid-slide')){
				jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single, div#woocase_display_pagination_s_settings_single').fadeIn();
			}

		jQuery('.woocase_post_settings_select, .woocase_display_settings_select, .woocase_fullscreen_styles_settings_select, .woocase_carousel_styles_settings_select').on('change', function(){

			if( jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-fullscreen-slide' && (jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-classic-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-modern-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-minimal-style' || jQuery('.woocase_fullscreen_styles_settings_select').val() === 'woocase-fullscreen-flat-style')){
				jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single, div#woocase_image_upload_single, div#woocase_background_image_color_settings').fadeIn();

				jQuery('div#woocase_display_page_per_slide_settings, div#woocase_display_pagination_s_settings_single').hide();
			} else {
				jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single, div#woocase_display_pagination_s_settings_single, div#woocase_display_page_per_slide_settings, div#woocase_display_slider_container_width_settings_single, div#woocase_image_upload_single, div#woocase_background_image_color_settings').hide();
			}
			
			if((jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-carousel-slide') && (jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-center-focused-v1-style' || jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-center-focused-v2-style')){
				jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single, div#woocase_display_pagination_s_settings_single, div#woocase_display_slider_container_width_settings_single').fadeIn();
				jQuery('div#woocase_display_page_per_slide_settings').hide();
			} else if((jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-carousel-slide') && (jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-classic-v1-style' || jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-classic-v2-style' || jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-with-thumbnail-slider-style')){
				jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single, div#woocase_display_pagination_s_settings_single, div#woocase_display_page_per_slide_settings').fadeIn();

				if(jQuery('.woocase_carousel_styles_settings_select').val() === 'woocase-carousel-with-thumbnail-slider-style'){
					jQuery('div#woocase_display_page_per_slide_settings').hide();
				}
			} else if((jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-sidebar-slide')){
				jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single, div#woocase_display_pagination_s_settings_single').fadeIn();
			} else if((jQuery('.woocase_post_settings_select').val() === 'woocase-post-slider' && jQuery('.woocase_display_settings_select').val() === 'woocase-grid-slide')){
				jQuery('div#woocase_display_auto_slide_settings_single, div#woocase_display_navigation_settings_single, div#woocase_display_slide_time_settings_single, div#woocase_display_pagination_s_settings_single').fadeIn();
			}

		});


	});

}('jQuery'));