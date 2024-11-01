<?php 

	class woocasePaginationFields implements woocaseFieldsInterface{
		/**
		 * Woocasepro Version
		 */
		public $ver = '1.0';

		/**
		 * Woocasepro Text Domain
		 */
		public $textDomain = 'woocasepro';
		
		public function woocaseFields($post){
			ob_start();

				?>
					<div id="woocase-pagination-nav">
							<a href="#" woocase-data-nav="prev" class="button button-primary button-large">Prev</a>
					</div>
				<?php 

					
			 
			    echo ob_get_clean();
		}

	}