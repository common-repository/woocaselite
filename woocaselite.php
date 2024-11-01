<?php 
/*
Plugin Name: Woocase Lite
Plugin URI: http://www.woocase.wooslide.com/
Description: WooCaseLite is the strongest plugin to showcase WooCommerce products in style.
Author: Pixiefy
Version: 0.1
Author URI: http://pixiefy.com/
Text Domain: woocasepro
*/
/**
 * All init
 */


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('woocasepro/woocasepro.php')) :

    add_action( 'admin_notices', 'woocasepro_already_exist_notice' );
    deactivate_plugins( plugin_basename( __FILE__ ) );

    else :

    define("WOOCASE_PLUG_URL", plugins_url('/', __FILE__));



    if ( ! class_exists( 'WooCaseProInit' ) ) :
        
        class WooCaseProInit {


            /**
             * Plugin version.
             *
             * @var string
             */
            const VERSION = '0.1';

            /**
             * Instance of this class.
             *
             * @var object
             */
            protected static $instance = null;


            /**
             * Initialize the plugin.
             */
            public function __construct(){

                    
                    /**
                     * Check if WooCommerce is active
                     **/
                    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

                        require_once( plugin_dir_path( __FILE__ ) . 'classes/woocasepro-general-settings.php');
                        require_once( plugin_dir_path( __FILE__ ) . 'classes/woocasepro-metaboxes.php');
                        require_once( plugin_dir_path( __FILE__ ) . 'classes/woocasepro-display-style.php');
                        $woocasepro = new wooCasePro(new woocaseproMetaboxes);

                        if ( ! class_exists( 'Mobile_Detect' ) ) {
                            require_once( plugin_dir_path( __FILE__ ) . 'inc/mobile_detect.php');
                        }

                        
                        
                        

                        require_once plugin_dir_path( __FILE__ ) . 'inc/init.php';

                        load_plugin_textdomain( 'woocasepro', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );

                        
                    } else {
                        
                        add_action( 'admin_init', array( $this, 'woocasepro_plugin_deactivate') );
                        add_action( 'admin_notices', array( $this, 'woocasepro_woocommerce_missing_notice' ) );
                    }

                } // end of contructor


            /**
             * Return an instance of this class.
             *
             * @return object A single instance of this class.
             */
            public static function get_instance() {
                // If the single instance hasn't been set, set it now.
                if ( null == self::$instance ) {
                    self::$instance = new self;
                }

                return self::$instance;
            }

            /**
             * WooCommerce fallback notice.
             *
             * @return string
             */
            public function woocasepro_woocommerce_missing_notice() {
                echo '<div class="error"><p>' . sprintf( __( 'WooCasePro - says "There must be active install of %s to take a flight!"', 'woocasepro' ), '<a href="http://www.woothemes.com/woocommerce/" target="_blank">' . __( 'WooCommerce', 'woocasepro' ) . '</a>' ) . '</p></div>';
                if ( isset( $_GET['activate'] ) )
                     unset( $_GET['activate'] );    
            }

            /**
             * WooCommerce fallback notice.
             *
             * @return string
             */
            public function woocasepro_plugin_deactivate() {
                deactivate_plugins( plugin_basename( __FILE__ ) );
            }
                

        }// end of the class

    add_action( 'plugins_loaded', array( 'WooCaseProInit', 'get_instance' ), 0 );

    endif;

endif;

function woocasepro_already_exist_notice(){
    echo '<div class="error"><p>' . sprintf( __( 'Woocase Preimum Version already exists.', 'woocasepro' ), '<a href="http://www.woothemes.com/woocommerce/" target="_blank">' . __( 'WooCommerce', 'woocasepro' ) . '</a>' ) . '</p></div>';
            if ( isset( $_GET['activate'] ) )
                 unset( $_GET['activate'] );  
}