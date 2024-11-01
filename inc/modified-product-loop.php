<?php 

	// Modify Product Loop
    $woocase_products = array();
    if($woocase_post_format === 'selected-product'){
    	$woocase_products['post__in'] = $woocase_selected_post;

        $woocase_total_post_per_page = -1;

    } elseif($woocase_post_format === 'popular-product'){
    	if($woocase_popupler_post === 'popular-sell'){
    		$woocase_products['operator'] = 'IN';
    		$woocase_products['meta_key'] = 'total_sales';
    		$woocase_products['orderby'] = 'meta_value_num';
    		$woocase_products['meta_query'] = WC()->query->get_meta_query();
    	} elseif($woocase_popupler_post === 'poplular-rating'){
    		$woocase_products['meta_key'] = '_wc_average_rating';
    		$woocase_products['orderby'] = 'meta_value_num';
    		$woocase_products['meta_query'] = WC()->query->get_meta_query();
    	} elseif ($woocase_popupler_post === 'popular-view'){
			$woocase_products['meta_key'] = '_woocase_post_view_count';
			$woocase_products['orderby'] = 'meta_value_num';
			$woocase_products['meta_query'] = WC()->query->get_meta_query();
		}
    } elseif($woocase_post_format === 'category-product'){
        $woocase_products['tax_query'][0]['taxonomy'] = 'product_cat';
        $woocase_products['tax_query'][0]['field'] = 'id';
        $woocase_products['tax_query'][0]['terms'] = $woocase_category_list;
    }
