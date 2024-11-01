<?php


/**
 * Main Woocasepro Shortcode
 */
function woocasepro_main_shortcode_func( $atts ) {
    extract(shortcode_atts( array(
        'woocase_id' => ''
    ), $atts ));


    $woocase_device_detect = new Mobile_Detect;

    // Get All Metabox Value
    // Get Post Format
    $woocase_post_format = get_post_meta( $woocase_id, '_woocase_general_settings', true );

    // Get Total Post Per Page
    $woocase_total_post_per_page = (!empty(get_post_meta( $woocase_id, '_woocase_total_post_settings', true ))) ? get_post_meta( $woocase_id, '_woocase_total_post_settings', true ) : '2';



    // Post Settings
    $woocase_post_settings = get_post_meta( $woocase_id, '_woocase_post_settings', true );

    // Slide Type
    $woocase_slide_type = get_post_meta( $woocase_id, '_woocase_slide_type_settings', true );
    // Grid Type
    $woocase_grid_type = get_post_meta( $woocase_id, '_woocase_grid_type_settings', true );
    // List Type
    $woocase_list_type = get_post_meta( $woocase_id, '_woocase_list_type_settings', true );



    // Carousel Style For Slider Type
    $woocase_carousel_Style = get_post_meta( $woocase_id, '_woocase_carousel_styles_settings', true );

    // Grid Style For Grid Type
    $woocase_grid_column_Style = get_post_meta( $woocase_id, '_woocase_grid_column_styles_settings', true );



    // Navigation
    $woocase_navigation_settings = get_post_meta( $woocase_id, '_woocase_navigation_settings', true );

    // Pagination
    $woocase_pagination_settings = get_post_meta( $woocase_id, '_woocase_pagination_s_settings', true );

    // Auto Slide
    $woocase_auto_slide = get_post_meta( $woocase_id, '_woocase_auto_slide_settings', true );

    // Slide Time
    $woocase_slide_time = get_post_meta( $woocase_id, '_woocase_slide_time_settings', true );

    // Page Per Slide Time
    $woocase_page_per_slide = get_post_meta( $woocase_id, '_woocase_display_page_per_slide_settings', true );


    // Modify Product Loop
    // Modify Product Loop
    $woocase_products = array();
    if($woocase_post_format === 'featured-product'){
        $meta_query  = WC()->query->get_meta_query();
        $tax_query   = WC()->query->get_tax_query();
        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'IN',
        );

        $woocase_products['meta_query'] = $meta_query;
        $woocase_products['tax_query'] = $tax_query;
    }



    // Stored Style
    $woocase_style = '';
    // If Slider
    if($woocase_post_settings === 'woocase-post-slider'){
        if($woocase_slide_type === 'woocase-carousel-slide'){
            $woocase_style = $woocase_carousel_Style;
        } 
    }
    // End If Slider

    // If Grid
    elseif($woocase_post_settings === 'woocase-post-grid'){
        $woocase_style = $woocase_grid_column_Style;
    }
    // End If Grid

    // If List
    elseif($woocase_post_settings === 'woocase-post-list'){
        $woocase_style = $woocase_list_type;
    }
    // End If List

    // Product Loop
    $args  = array(
        'post_type'     => 'product',
        'posts_per_page'    => $woocase_total_post_per_page,
    );

    $args = array_merge($args, $woocase_products);
    $query = new WP_Query( $args );


    $woocase_args = array(
        'woocase_style'                         => $woocase_style,
        'woocase_type'                          => $woocase_grid_type,
        'woocase_navigation'                    => $woocase_navigation_settings,
        'woocase_auto_slide'                    => $woocase_auto_slide,
        'woocase_slide_time'                    => $woocase_slide_time,
        'woocase_pagination_settings'           => $woocase_pagination_settings,
        'woocase_page_per_slide'                => $woocase_page_per_slide,
        'woocase_id'                            => $woocase_id,
        'woocase_ajax'                          => false,
        'woocase_device_detect'                 => $woocase_device_detect,
    );

    // Displaying Product
    if($woocase_style === 'woocase-carousel-classic-v1-style'){
        ob_start();
            new woocaseproDisplayStyle(new woocaseproCarouselClassicV1Style($query, $woocase_args));
        return ob_get_clean();
    } elseif($woocase_style === 'woocase-carousel-classic-v2-style'){
        ob_start();
            new woocaseproDisplayStyle(new woocaseproCarouselClassicV2Style($query, $woocase_args));
        return ob_get_clean();
    } elseif(($woocase_grid_type === 'woocase-2-column-grid' || $woocase_grid_type === 'woocase-4-column-grid') && ($woocase_style === 'woocase-grid-column-classic-v1')){
        ob_start();
            new woocaseproDisplayStyle(new woocaseproGridColumnV1Style($query, $woocase_args));
        return ob_get_clean();
    } elseif(($woocase_grid_type === 'woocase-2-column-grid' || $woocase_grid_type === 'woocase-4-column-grid') && ($woocase_style === 'woocase-grid-column-classic-v2')){
        ob_start();
            new woocaseproDisplayStyle(new woocaseproGridColumnV2Style($query, $woocase_args));
        return ob_get_clean();
    } elseif($woocase_style === 'woocase-list-with-side-thumb'){
        ob_start();
            new woocaseproDisplayStyle(new woocaseproListWithSideThumbStyle($query, $woocase_args));
        return ob_get_clean();
    }
    



}
add_shortcode( 'woocaselite', 'woocasepro_main_shortcode_func' );

// Extra functions
require_once( plugin_dir_path( __FILE__ ) . 'extra-functions.php');

add_filter('widget_text', 'do_shortcode');

add_action( 'wp_ajax_woocase_ajax_load', 'woocase_ajax_load_callback' );
add_action( 'wp_ajax_nopriv_woocase_ajax_load', 'woocase_ajax_load_callback' );
function woocase_ajax_load_callback(){
    $woocase_id = $_POST['load_more_id'];
    $woocase_offset = $_POST['page'];

    $woocase_device_detect = new Mobile_Detect;

    // Get All Metabox Value
    // Get Post Format
    $woocase_post_format = get_post_meta( $woocase_id, '_woocase_general_settings', true );

    // Get Total Post Per Page
    $woocase_total_post_per_page = (!empty(get_post_meta( $woocase_id, '_woocase_total_post_settings', true ))) ? get_post_meta( $woocase_id, '_woocase_total_post_settings', true ) : '2';



    // Post Settings
    $woocase_post_settings = get_post_meta( $woocase_id, '_woocase_post_settings', true );

    // Slide Type
    $woocase_slide_type = get_post_meta( $woocase_id, '_woocase_slide_type_settings', true );
    // Grid Type
    $woocase_grid_type = get_post_meta( $woocase_id, '_woocase_grid_type_settings', true );
    // List Type
    $woocase_list_type = get_post_meta( $woocase_id, '_woocase_list_type_settings', true );



    // Carousel Style For Slider Type
    $woocase_carousel_Style = get_post_meta( $woocase_id, '_woocase_carousel_styles_settings', true );

    // Grid Style For Grid Type
    $woocase_grid_column_Style = get_post_meta( $woocase_id, '_woocase_grid_column_styles_settings', true );



    // Navigation
    $woocase_navigation_settings = get_post_meta( $woocase_id, '_woocase_navigation_settings', true );

    // Pagination
    $woocase_pagination_settings = get_post_meta( $woocase_id, '_woocase_pagination_s_settings', true );

    // Auto Slide
    $woocase_auto_slide = get_post_meta( $woocase_id, '_woocase_auto_slide_settings', true );

    // Slide Time
    $woocase_slide_time = get_post_meta( $woocase_id, '_woocase_slide_time_settings', true );

    // Page Per Slide Time
    $woocase_page_per_slide = get_post_meta( $woocase_id, '_woocase_display_page_per_slide_settings', true );

   

    // Modify Product Loop
    // Modify Product Loop
    $woocase_products = array();
    if($woocase_post_format === 'featured-product'){
        $meta_query  = WC()->query->get_meta_query();
        $tax_query   = WC()->query->get_tax_query();
        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'IN',
        );

        $woocase_products['meta_query'] = $meta_query;
        $woocase_products['tax_query'] = $tax_query;
    }



    // Stored Style
    $woocase_style = '';
    // If Slider
    if($woocase_post_settings === 'woocase-post-slider'){
        if($woocase_slide_type === 'woocase-carousel-slide'){
            $woocase_style = $woocase_carousel_Style;
        }
    }
    // End If Slider

    // If Grid
    elseif($woocase_post_settings === 'woocase-post-grid'){
        $woocase_style = $woocase_grid_column_Style;
    }
    // End If Grid

    // If List
    elseif($woocase_post_settings === 'woocase-post-list'){
        $woocase_style = $woocase_list_type;
    }
    // End If List

    // Product Loop
    $args  = array(
        'post_type'     => 'product',
        'offset'        => $woocase_offset,
        'posts_per_page'    => $woocase_total_post_per_page
    );

    $args = array_merge($args, $woocase_products);
    $query = new WP_Query( $args );


    $woocase_args = array(
        'woocase_style'                         => $woocase_style,
        'woocase_type'                          => $woocase_grid_type,
        'woocase_navigation'                    => $woocase_navigation_settings,
        'woocase_auto_slide'                    => $woocase_auto_slide,
        'woocase_slide_time'                    => $woocase_slide_time,
        'woocase_pagination_settings'           => $woocase_pagination_settings,
        'woocase_page_per_slide'                => $woocase_page_per_slide,
        'woocase_id'                            => $woocase_id,
        'woocase_ajax'                          => true,
        'woocase_device_detect'                 => $woocase_device_detect
    );


    // Displaying Product
    if($woocase_style === 'woocase-carousel-classic-v1-style'){
        ob_start();
            new woocaseproDisplayStyle(new woocaseproCarouselClassicV1Style($query, $woocase_args));
        echo ob_get_clean();
    } elseif($woocase_style === 'woocase-carousel-classic-v2-style'){
        ob_start();
            new woocaseproDisplayStyle(new woocaseproCarouselClassicV2Style($query, $woocase_args));
        echo ob_get_clean();
    } elseif(($woocase_grid_type === 'woocase-2-column-grid' || $woocase_grid_type === 'woocase-4-column-grid') && ($woocase_style === 'woocase-grid-column-classic-v1')){
        ob_start();
            new woocaseproDisplayStyle(new woocaseproGridColumnV1Style($query, $woocase_args));
        echo ob_get_clean();
    } elseif(($woocase_grid_type === 'woocase-2-column-grid' || $woocase_grid_type === 'woocase-4-column-grid') && ($woocase_style === 'woocase-grid-column-classic-v2')){
        ob_start();
            new woocaseproDisplayStyle(new woocaseproGridColumnV2Style($query, $woocase_args));
        echo ob_get_clean();
    } elseif($woocase_style === 'woocase-list-with-side-thumb'){
        ob_start();
            new woocaseproDisplayStyle(new woocaseproListWithSideThumbStyle($query, $woocase_args));
        echo ob_get_clean();
    }


    die();
}


function woocase_activation_hook() {
    $args = array(
        'post_type'     => 'product',
        'posts_per_page'    => -1
    );
    $query = new WP_Query( $args );

    if($query->have_posts()) : while($query->have_posts()) : $query->the_post();

        $check_post_view_exists = get_post_meta(  get_the_ID(), '_woocase_post_view_count', true );

        if(!$check_post_view_exists){
            update_post_meta( get_the_ID(), '_woocase_post_view_count', 0 );
        }

   endwhile; endif;

}
register_activation_hook( __FILE__, 'woocase_activation_hook' );



add_filter( 'post_row_actions', 'woocase_remove_row_actions', 10, 1 );

function woocase_remove_row_actions( $actions )
{
    if( get_post_type() === 'woocasepro' )
        unset( $actions['view'] );
    return $actions;
}
