<?php 
	require_once( plugin_dir_path( __FILE__ ) . 'view/woocase-view-interface.php');

	class woocaseproDisplayStyle{
		public $woocaseproView;

		public static $owls = 0;
		public static $openSans = 0;
		public static $isotope = 0;
		public static $cmmf_style = 0;
		public static $vertical_mordernizer = 0;
		public static $woo_image_loaded = 0;

		public function __construct(woocaseproViewInterface $woocaseproViewInterface){
			$this->woocaseproView = $woocaseproViewInterface;



			if(isset($this->woocaseproView->cmmf_style) && $this->woocaseproView->cmmf_style === true){
				static::$cmmf_style += 1;
			}

			if(isset($this->woocaseproView->vertical_mordernizer) && $this->woocaseproView->vertical_mordernizer === true){
				static::$vertical_mordernizer += 1;
			}

			if(isset($this->woocaseproView->owl) && $this->woocaseproView->owl === true){
				static::$owls += 1;
			}
			if(isset($this->woocaseproView->isotope) && $this->woocaseproView->isotope === true){
				static::$isotope += 1;
			}
			if(isset($this->woocaseproView->woo_image_loaded) && $this->woocaseproView->woo_image_loaded === true){
				static::$woo_image_loaded += 1;
			}

			if(isset($this->woocaseproView->openSans) && $this->woocaseproView->openSans === true){
				static::$openSans += 1;
			}


			if(static::$owls === 1 && $this->woocaseproView->owl === true):
				if($this->woocaseproView->woocase_args['woocase_ajax'] === false) :
					echo $this->woocase_owl_scripts();
				endif;
				
				$this->woocase_owl_styles();
			endif;

			if(static::$cmmf_style === 1 && $this->woocaseproView->cmmf_style === true):
				echo $this->woocase_cmmf_styles();
			endif;

			if(static::$vertical_mordernizer === 1 && $this->woocaseproView->vertical_mordernizer === true):
				echo $this->woocase_vertical_mordernizer_scripts();
			endif;


			if(static::$isotope === 1 && $this->woocaseproView->isotope === true):
				if($this->woocaseproView->woocase_args['woocase_ajax'] === false) :
					echo $this->woocase_isotope_scripts();
				endif;
			endif;

			if(static::$woo_image_loaded === 1 && $this->woocaseproView->woo_image_loaded === true):
				if($this->woocaseproView->woocase_args['woocase_ajax'] === false) :
					echo $this->woocase_image_loaded_scripts();
				endif;
			endif;

			if(static::$openSans === 1 && $this->woocaseproView->openSans === true):
				$this->woocase_open_sans();
			endif;
			
			$this->woocaseproView->woocase_view_scripts();
			$this->woocaseproView->woocase_view_styles();
			$this->woocaseproView->woocase_view();
		}

		public function woocase_owl_scripts(){
			return '<script type="text/javascript" src="'. plugins_url("assets/js/classic-modern-minimal-flat/owl.carousel.min.js", dirname(__file__)) .'"></script>';
		}

		public function woocase_vertical_mordernizer_scripts(){
			return '<script type="text/javascript" src="'. plugins_url("assets/js/vertical/vertical-woocase-modernizr.custom.js", dirname(__file__)) .'"></script>';
		}

		public function woocase_isotope_scripts(){
			return '<script type="text/javascript" src="'. plugins_url("assets/js/isotope.min.js", dirname(__file__)) .'"></script>';
		}

		public function woocase_image_loaded_scripts(){
			return '<script type="text/javascript" src="'. plugins_url("assets/js/imagesloaded.pkgd.min.js", dirname(__file__)) .'"></script>';
		}

		public function woocase_owl_styles(){
			wp_enqueue_style( 'woocase-owl-carousel',plugins_url('assets/css/classic-modern-minimal-flat/owl.carousel.min.css', dirname(__file__)), array(), '1.0', 'all' );
		    wp_enqueue_style( 'woocase-owl-carousel-default-theme',plugins_url('assets/css/classic-modern-minimal-flat/owl.theme.default.min.css', dirname(__file__)), array(), '1.0', 'all' );
		    wp_enqueue_style( 'woocase-owl-carousel-green-theme',plugins_url('assets/css/classic-modern-minimal-flat/owl.theme.green.min.css', dirname(__file__)), array(), '1.0', 'all' );
		}

		public function woocase_cmmf_styles(){
			ob_start();
			?>
				<link rel="stylesheet" href="<?php echo plugins_url('assets/css/classic-modern-minimal-flat/style.css', dirname(__file__)); ?>">
			<?php

			return ob_get_clean();
		}

		public function woocase_open_sans(){
			wp_enqueue_style( 'woocase-open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', array(), '1.0', 'all' );
		}
	}