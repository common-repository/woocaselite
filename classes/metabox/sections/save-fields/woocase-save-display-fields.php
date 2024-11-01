<?php 

	class woocaseSaveDisplayFields implements woocaseSaveFieldsInterface{
		public function woocaseSaveFields($post_id){

			if(isset($_POST["woocase_display_settings"])){
		         //UPDATE: 
		        $woocase_display_settings = $_POST['woocase_display_settings'];
		        //END OF UPDATE

		        update_post_meta($post_id, '_woocase_slide_type_settings', $woocase_display_settings);

		    }



	         //UPDATE: 
	        $woocase_display_auto_slide_settings = isset($_POST['woocase_display_auto_slide_settings']) ? true : false;
	        //END OF UPDATE

	        update_post_meta($post_id, '_woocase_auto_slide_settings', $woocase_display_auto_slide_settings);



	         //UPDATE: 
	        $woocase_display_navigation_settings = isset($_POST['woocase_display_navigation_settings']) ? true : false;
	        //END OF UPDATE

	        update_post_meta($post_id, '_woocase_navigation_settings', $woocase_display_navigation_settings);



	         //UPDATE: 
	        $woocase_display_autoplay_settings = isset($_POST['woocase_display_autoplay_settings']) ? true : false;
	        //END OF UPDATE

	        update_post_meta($post_id, '_woocase_autoplay_settings', $woocase_display_autoplay_settings);

	        
	         //UPDATE: 
	        $woocase_display_pagination_s_settings = isset($_POST['woocase_display_pagination_s_settings']) ? true : false;
	        //END OF UPDATE

	        update_post_meta($post_id, '_woocase_pagination_s_settings', $woocase_display_pagination_s_settings);


		    if(isset($_POST["woocase_display_slide_time_settings"])){
		         //UPDATE: 
		        $woocase_display_slide_time_settings = $_POST['woocase_display_slide_time_settings'];
		        //END OF UPDATE

		        update_post_meta($post_id, '_woocase_slide_time_settings', $woocase_display_slide_time_settings);

		    }

		    if(isset($_POST["woocase_display_select_slider_style_settings"])){
		         //UPDATE: 
		        $woocase_display_select_slider_style_settings = $_POST['woocase_display_select_slider_style_settings'];
		        //END OF UPDATE

		        update_post_meta($post_id, '_woocase_select_slider_style_settings', $woocase_display_select_slider_style_settings);

		    }

		    if(isset($_POST["woocase_display_page_per_slide_settings"])){
		         //UPDATE: 
		        $woocase_display_page_per_slide_settings = $_POST['woocase_display_page_per_slide_settings'];
		        //END OF UPDATE

		        update_post_meta($post_id, '_woocase_display_page_per_slide_settings', $woocase_display_page_per_slide_settings);

		    }
		    
		    if(isset($_POST["woocase_post_settings"])){
		         //UPDATE: 
		        $woocase_post_settings = $_POST['woocase_post_settings'];
		        //END OF UPDATE

		        update_post_meta($post_id, '_woocase_post_settings', $woocase_post_settings);

		    }

		    
		    // Carousel Style
		    if(isset($_POST["woocase_carousel_styles_settings"])){
		         //UPDATE: 
		        $woocase_carousel_styles_settings = $_POST['woocase_carousel_styles_settings'];
		        //END OF UPDATE

		        update_post_meta($post_id, '_woocase_carousel_styles_settings', $woocase_carousel_styles_settings);

		    }
		    

		    // Grid Type
			if(isset($_POST["woocase_grid_type_settings"])){
		         //UPDATE: 
		        $woocase_grid_type_settings = $_POST['woocase_grid_type_settings'];
		        //END OF UPDATE

		        update_post_meta($post_id, '_woocase_grid_type_settings', $woocase_grid_type_settings);

		    }

		     // Grid Column Style
		    if(isset($_POST["woocase_grid_column_styles_settings"])){
		         //UPDATE: 
		        $woocase_grid_column_styles_settings = $_POST['woocase_grid_column_styles_settings'];
		        //END OF UPDATE

		        update_post_meta($post_id, '_woocase_grid_column_styles_settings', $woocase_grid_column_styles_settings);

		    }
	
		    
		    // List Style
		    if(isset($_POST["woocase_list_type_settings"])){
		         //UPDATE: 
		        $woocase_list_type_settings = $_POST['woocase_list_type_settings'];
		        //END OF UPDATE

		        update_post_meta($post_id, '_woocase_list_type_settings', $woocase_list_type_settings);

		    }
		    

		}
	}