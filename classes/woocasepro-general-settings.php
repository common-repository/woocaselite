<?php 

class wooCasePro{
	/**
	 * Woocasepro Version
	 */
	public $ver = '1.0';

	/**
	 * Woocasepro Text Domain
	 */
	public $textDomain = 'woocasepro';

	public $woocaseAllSection;

	/**
	 * Woocasepro Constructor
	 */
	public function __construct(woocaseproMetaboxes $woocaseAllSection){
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_adding_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'fronend_adding_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'adding_admin_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'adding_admin_styles' ) );
		
		add_action( 'wp_footer', array( $this, 'adding_styles_in_footer' ), 1000 );

		add_action( 'init', array( $this, 'woocasepro_post_type_generate' ) );

		$woocaseAllSection = $woocaseAllSection->woocaseAllSection();
		$woocaseAllSection();
	}

	/**
	 * Frontend Scripts
	 */
	public function frontend_adding_scripts(){
		wp_enqueue_script( 'magnific-popup', plugins_url( 'assets/js/jquery.magnific-popup.min.js', dirname(__FILE__) ), array( 'jquery' ), $this->ver, false );
		wp_enqueue_script( 'woocase-main', plugins_url( 'assets/js/woocasepro-main.js', dirname(__FILE__) ), array( 'jquery' ), $this->ver, true );
		
		wp_localize_script( 'woocase-main', 'woocase_ajax', array(
			'ajax_url' 						=> admin_url( 'admin-ajax.php' ),
		    'woocase_site_dir'                  => WOOCASE_PLUG_URL,
		    'woocase_site_url'                  => site_url()
		));
	}

	/**
	 * Frontend Styles
	 */
	public function fronend_adding_styles(){
		wp_enqueue_style( 'woocase-magnific-popup', plugins_url( 'assets/css/magnific-popup.css', dirname(__FILE__) ), array(), $this->ver, 'all' ); 
		wp_enqueue_style( 'woocase-style', plugins_url( 'assets/css/woocase-style.css', dirname(__FILE__) ), array(), $this->ver, 'all' ); 

	}

	/**
	 * Woocasepro Admin Scripts
	 */
	public function adding_admin_scripts($hook){
		if(get_post_type() != 'woocasepro') {
                return;
        }

        wp_enqueue_media();
	    wp_dequeue_script('thickbox');
	    wp_enqueue_script('thickbox');
	    wp_register_script('woocase-image-upload', plugins_url( 'assets/js/woocasepro-admin-image-upload.js', dirname(__FILE__) ), array('jquery','media-upload','thickbox'));
	    wp_enqueue_script('woocase-image-upload');

        wp_enqueue_script('jquery-ui-slider');
        wp_enqueue_style( 'uss-admin-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), $this->ver, 'all' );
        wp_enqueue_script( 'woocasepro-select2-script', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', array( 'jquery' ), $this->ver, true );
         wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( 'assets/js/wp-color-picker-alpha.min.js', dirname(__FILE__) ), array( 'jquery', 'wp-color-picker' ), $this->ver, true );

        
        wp_enqueue_script( 'woocasepro-admin-main-script', plugins_url( 'assets/js/woocasepro-admin-main.js', dirname(__FILE__) ), array( 'jquery', 'wp-color-picker' ), $this->ver, true );

	}

	/**
	 * Woocasepro Admin Styles
	 */
	public function adding_admin_styles($hook){
		if(get_post_type() != 'woocasepro') {
                return;
        }

        wp_dequeue_style('thickbox');
        wp_enqueue_style('thickbox');

wp_dequeue_style('wp-color-picker');
// wp_deregister_style('wp-color-picker');
        wp_enqueue_style( 'wp-color-picker' );

        wp_enqueue_style( 'woocasepro-select2-css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css', array(), $this->ver, 'all' );
        wp_enqueue_style( 'woocasepro-admin-theme-options-css',  plugins_url( 'assets/css/woocasepro-admin-theme-options.css', dirname(__FILE__) ), array(), $this->ver, 'all' );
	}

	public function adding_styles_in_footer(){
		echo "<link rel='stylesheet' href='". plugins_url( 'assets/css/woocase-responsive.css', dirname(__FILE__) ) ."' type='text/css' media='all' />";
	}

	/**
	 * Woocasepro Image size
	 */
	public static function getImageSize($url){ 
		$array = array();
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $data = curl_exec($ch); 
        $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

        if($contentType){
	        $resource = imagecreatefromstring($data); 
	        $width = imagesx($resource); 
	        $height = imagesy($resource);

	        $array['height'] = $height;
	        $array['width'] = $width;

	        return $array;
        } else{
        	return '';
        }
	}

	/**
	 * Woocasepro post type generate
	 */
	public function woocasepro_post_type_generate() {

		$labels = array(
			'name'                  => _x( 'Woocase Lite', 'Woocase Lite General Name', $this->textDomain ),
			'singular_name'         => _x( 'Woocase Lite', 'Woocase Lite Singular Name', $this->textDomain ),
			'menu_name'             => __( 'Woocase Lite', $this->textDomain ),
			'name_admin_bar'        => __( 'Post Type', $this->textDomain ),
			'archives'              => __( 'Item Archives', $this->textDomain ),
			'attributes'            => __( 'Item Attributes', $this->textDomain ),
			'parent_item_colon'     => __( 'Parent Item:', $this->textDomain ),
			'all_items'             => __( 'All Showcase Items', $this->textDomain ),
			'add_new_item'          => __( 'Add New Showcase Item', $this->textDomain ),
			'add_new'               => __( 'Add New Showcase', $this->textDomain ),
			'new_item'              => __( 'New showcase Item', $this->textDomain ),
			'edit_item'             => __( 'Edit showcase Item', $this->textDomain ),
			'update_item'           => __( 'Update sShowcase Item', $this->textDomain ),
			'view_item'             => __( 'View showcase Item', $this->textDomain ),
			'view_items'            => __( 'View showcase Items', $this->textDomain ),
			'search_items'          => __( 'Search Item', $this->textDomain ),
			'not_found'             => __( 'Not found', $this->textDomain ),
			'not_found_in_trash'    => __( 'Not found in Trash', $this->textDomain ),
			'featured_image'        => __( 'Featured Image', $this->textDomain ),
			'set_featured_image'    => __( 'Set featured image', $this->textDomain ),
			'remove_featured_image' => __( 'Remove featured image', $this->textDomain ),
			'use_featured_image'    => __( 'Use as featured image', $this->textDomain ),
			'insert_into_item'      => __( 'Insert into showcase item', $this->textDomain ),
			'uploaded_to_this_item' => __( 'Uploaded to this showcase item', $this->textDomain ),
			'items_list'            => __( 'Items list', $this->textDomain ),
			'items_list_navigation' => __( 'Items list navigation', $this->textDomain ),
			'filter_items_list'     => __( 'Filter items list', $this->textDomain ),
		);
		$args = array(
			'label'                 => __( 'Post Type', $this->textDomain ),
			'description'           => __( 'Post Type Description', $this->textDomain ),
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'taxonomies'            => array( ),
			'hierarchical'          => false,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 56,
			'menu_icon'				=> 'dashicons-images-alt',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => false,
			'capability_type'       => 'page',
		);
		register_post_type( 'woocasepro', $args );

	}


}
