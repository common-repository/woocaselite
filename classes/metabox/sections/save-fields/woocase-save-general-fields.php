<?php 

	class woocaseSaveGeneralFields implements woocaseSaveFieldsInterface{
		public function woocaseSaveFields($post_id){
			
		    

		    if(isset($_POST["woocase_general_settings"])){
		         //UPDATE: 
		        $woocase_general_settings = $_POST['woocase_general_settings'];
		        //END OF UPDATE

		        update_post_meta($post_id, '_woocase_general_settings', $woocase_general_settings);
		        //print_r($_POST);
		    }

		

		    if(isset($_POST["woocase_total_post_settings"])){
		         //UPDATE: 
		        $woocase_total_post_settings = $_POST['woocase_total_post_settings'];
		        //END OF UPDATE

		        update_post_meta($post_id, '_woocase_total_post_settings', $woocase_total_post_settings);
		        //print_r($_POST);
		    }

		}
	}