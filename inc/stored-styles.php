<?php 

    $woocase_style = '';
    // If Slider
    if($woocase_post_settings === 'woocase-post-slider'){
        if($woocase_slide_type === 'woocase-fullscreen-slide') {
            $woocase_style = $woocase_fullscreen_Style;
        } elseif($woocase_slide_type === 'woocase-carousel-slide'){
            $woocase_style = $woocase_carousel_Style;
        } elseif($woocase_slide_type === 'woocase-grid-slide'){
            $woocase_style = $woocase_grid_Style;
        } elseif($woocase_slide_type === 'woocase-sidebar-slide'){
            $woocase_style = $woocase_sidebar_Style;
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