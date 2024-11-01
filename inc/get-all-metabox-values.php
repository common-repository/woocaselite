<?php 

	// Get Post Format
    $woocase_post_format = get_post_meta( $woocase_id, '_woocase_general_settings', true );

    // Get Selected Post
    $woocase_selected_post = get_post_meta( $woocase_id, '_woocase_featured_post', true );

    // Get Populer Post
    $woocase_popupler_post = get_post_meta( $woocase_id, '_woocase_popular_order_settings', true );

    // Get Category List
    $woocase_category_list = get_post_meta( $woocase_id, '_woocase_category_list', true );

    // Get Total Post Per Page
    $woocase_total_post_per_page = get_post_meta( $woocase_id, '_woocase_total_post_settings', true );



    // Post Settings
    $woocase_post_settings = get_post_meta( $woocase_id, '_woocase_post_settings', true );

    // Slide Type
    $woocase_slide_type = get_post_meta( $woocase_id, '_woocase_slide_type_settings', true );
    // Grid Type
    $woocase_grid_type = get_post_meta( $woocase_id, '_woocase_grid_type_settings', true );
    // List Type
    $woocase_list_type = get_post_meta( $woocase_id, '_woocase_list_type_settings', true );



    // Fullscreen Style For Slider Type
    $woocase_fullscreen_Style = get_post_meta( $woocase_id, '_woocase_fullscreen_styles_settings', true );
    // Carousel Style For Slider Type
    $woocase_carousel_Style = get_post_meta( $woocase_id, '_woocase_carousel_styles_settings', true );
    // Grid Style For Slider Type
    $woocase_grid_Style = get_post_meta( $woocase_id, '_woocase_grid_styles_settings', true );
    // Sidebar Style For Slider Type
    $woocase_sidebar_Style = get_post_meta( $woocase_id, '_woocase_sidebar_styles_settings', true );

    // Grid Style For Grid Type
    $woocase_grid_column_Style = get_post_meta( $woocase_id, '_woocase_grid_column_styles_settings', true );



    // Navigation
    $woocase_navigation_settings = get_post_meta( $woocase_id, '_woocase_navigation_settings', true );
    // Auto Slide
    $woocase_auto_slide = get_post_meta( $woocase_id, '_woocase_auto_slide_settings', true );

    // Slide Time
    $woocase_slide_time = get_post_meta( $woocase_id, '_woocase_slide_time_settings', true );

echo "<pre>";
     var_dump($woocase_navigation_settings);
echo "</pre>";

echo "<pre>";
     var_dump($woocase_fullscreen_Style);
echo "</pre>";