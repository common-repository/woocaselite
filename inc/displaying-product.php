<?php 

	if($woocase_style === 'woocase-fullscreen-verticale-showcase-style') {

        ob_start();
            new woocaseproDisplayStyle(new woocaseproFullscreenVerticalShowcase($query));
        echo ob_get_clean();

    } if($woocase_post_settings === 'woocase-post-slider' && $woocase_style !== 'woocase-fullscreen-verticale-showcase-style') {

        $woocase_args = array(
            'woocase_style' => $woocase_style,
            'woocase_navigation'    => $woocase_navigation_settings,
            'woocase_auto_slide'        => $woocase_auto_slide,
            'woocase_slide_time'    => $woocase_slide_time
        );
        ob_start();
            new woocaseproDisplayStyle(new woocaseproFullscreenClassicStyle($query, $woocase_args));
        echo ob_get_clean();

    }