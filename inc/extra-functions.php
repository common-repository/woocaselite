<?php 





	/**
	 * Add Column In the Admin Page
	 */
	add_filter( 'manage_woocasepro_posts_columns', 'set_custom_edit_woocasepro_columns' );
	add_action( 'manage_woocasepro_posts_custom_column' , 'custom_woocasepro_column', 10, 2 );

	function set_custom_edit_woocasepro_columns($columns) {
		unset($columns['date']);
	    $columns['woocasepro_shortcode'] = __( 'Shortcode', 'woocasepro' );
	    $columns['date'] = __( 'Date', 'woocasepro' );
	    return $columns;
	}

	function custom_woocasepro_column( $column, $post_id ) {
		global $post;
	    switch ( $column ) {

	        case 'woocasepro_shortcode' :
	       		ob_start();
	       		if($post->post_status == "publish") :
	            ?>
	            <input type="text" onfocus="this.select();" readonly="readonly" value="[woocaselite woocase_id=&quot;<?php echo $post_id; ?>&quot; title=&quot;<?php echo get_the_title($post_id); ?>&quot;]" class="large-text code">
	            <?php
	            endif;
	            echo ob_get_clean();
	        break;

	    }
	    
	}
