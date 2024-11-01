(function($){

	// Image Centralize
	function woocase_image_centralize(){
		jQuery('.woocase-carousel-elements img.woocase-simple-thumb').each(function(i, img) {
		    jQuery(img).css({
		        top: (jQuery(img).closest('figure').height()/2) - (jQuery(img).height()/2)
		    });
		});
	}

	jQuery(window).on('load', function(){
		if (typeof woocase_image_centralize != 'undefined' && jQuery.isFunction(woocase_image_centralize)) {
			woocase_image_centralize();
		}
	});




	jQuery(function() {
		 jQuery.fn.exists = function(){return this.length>0;}

		// Load More
		var load_more_btn = jQuery('.woocase-load-more-button');

		if(load_more_btn.exists()){
			load_more_btn.on('click', 'a', function(e){
				e.preventDefault();
				var $load_more_loader = jQuery('.woocase_loadmore_loader'), 
					load_more_style = jQuery(this).attr('woocase-data-load-more'),
					load_more_id = jQuery(this).attr('woocase-data-load-more-id'),
					self = jQuery(this),

					number = jQuery(this).closest('.woocase-carousel-default-css').find('.woocase-grid-column-single-item').length;

				if(load_more_id !== '' && jQuery.isNumeric(Number(load_more_id))  === true && !self.hasClass('woocase-load-more-finished')){

					jQuery.ajax({
						url : woocase_ajax.ajax_url,
						type : 'POST',
						data : {
							action : 'woocase_ajax_load',
							'page': number,
		        			'load_more_id': load_more_id
						},
						beforeSend : function (){

			                self.hide();

			                self.closest('.woocase-load-more-button').append("<div class='woocase_loadmore_loader'><img src='"+ woocase_ajax.woocase_site_dir +"/assets/images/woocase-load-more-preloader.gif' alt='Preloader'></div>");
			            },
						success : function( response ) {
							if(response !== '') {

								var obj = jQuery(response);
								obj.imagesLoaded(function(){
									jQuery(response).hide().appendTo(self.closest('.woocase-carousel-default-css').find('.woocase-carousel-container')).fadeIn(1500);
								});

								if (typeof woocase_quick_look != 'undefined' && jQuery.isFunction(woocase_quick_look)) {
									woocase_quick_look();
								}
								
								setTimeout(function(){
									if (typeof woocase_image_centralize != 'undefined' && jQuery.isFunction(woocase_image_centralize)) {
										woocase_image_centralize();
									}
								}, 100);

								jQuery('.woocase_loadmore_loader').fadeOut("normal", function() {
							        jQuery(this).remove();
							    });
							    self.fadeIn();

							} else {
							    self.closest('.woocase-load-more-button').find('.woocase_loadmore_loader').hide();
								self.closest('.woocase-load-more-button').find('a').addClass('woocase-load-more-finished').fadeIn().html('All Products Loaded.');
								setTimeout(function(){
									self.closest('.woocase-load-more-button').fadeOut("normal", function() {
								        jQuery(this).remove();
								    });
								}, 2000);
							}
							
						}
					});
				}
			});
		}

		// Load More masonary
		var load_more_btn = jQuery('.woocase-load-more-button-masonary');

		if(load_more_btn.exists()){
			load_more_btn.on('click', 'a', function(e){
				e.preventDefault();
				var $load_more_loader = jQuery('.woocase_loadmore_loader'), 
					load_more_style = jQuery(this).attr('woocase-data-load-more'),
					load_more_id = jQuery(this).attr('woocase-data-load-more-id'),
					self = jQuery(this),

					number = jQuery(this).closest('.woocase-carousel-default-css').find('.woocase-grid-column-single-item').length;

				if(load_more_id !== '' && jQuery.isNumeric(Number(load_more_id))  === true && !self.hasClass('woocase-load-more-finished')){

					jQuery.ajax({
						url : woocase_ajax.ajax_url,
						type : 'POST',
						data : {
							action : 'woocase_ajax_load',
							'page': number,
		        			'load_more_id': load_more_id
						},
						beforeSend : function (){

			                self.hide();

			                self.closest('.woocase-load-more-button-masonary').append("<div class='woocase_loadmore_loader'><img src='"+ woocase_ajax.woocase_site_dir +"/assets/images/woocase-load-more-preloader.gif' alt='Preloader'></div>");
			            },
						success : function( response ) {
							
							if(response !== '') {
								var obj = jQuery(jQuery.parseHTML(response));
				                
								obj.imagesLoaded(function(){
									self.closest('.woocase-carousel-default-css').find('.woocase-carousel-container').append(obj).woocasetope('insert',obj);
								});

								if (typeof woocase_quick_look != 'undefined' && jQuery.isFunction(woocase_quick_look)) {
									woocase_quick_look();
								}
								if (typeof woocase_image_centralize != 'undefined' && jQuery.isFunction(woocase_image_centralize)) {
									woocase_image_centralize();
								}
								jQuery('.woocase_loadmore_loader').fadeOut("normal", function() {
							        jQuery(this).remove();
							    });
							    self.fadeIn();
							    
							} else {
								self.closest('.woocase-load-more-button-masonary').find('.woocase_loadmore_loader').hide();
								self.closest('.woocase-load-more-button-masonary').find('a').addClass('woocase-load-more-finished').fadeIn().html('All Products Loaded.');
								setTimeout(function(){
									self.closest('.woocase-load-more-button-masonary').fadeOut("normal", function() {
								        jQuery(this).remove();
								    });
								}, 2000);
							}
							
						}
					});
				}
			});
		}

		// Woocase Add to Cart
		if(jQuery('a.woocase-add-to-cart-btn').exists()){
			function woocase_add_to_cart(){
				jQuery(document).on('click', 'a.woocase-add-to-cart-btn', function(e){
					e.preventDefault();

					if(!$(this).hasClass('outofstock')){
						jQuery(this).addClass('woocase-ajax-btn-sp');


						var woocase_cart_url = jQuery(this).attr('href'),
							woocase_addtocart_preloader = jQuery('<img src="'+ woocase_ajax.woocase_site_dir +'assets/images/woocase-addtocart-preloader.gif" alt="" class="woocase-addtocart-preloader">'),
							woocase_addtocart_url = jQuery('<a  target="_blank" href="'+ woocase_ajax.woocase_site_url +'/cart/" class="woocase-addtocart-url">View Cart</a>'),
							self = jQuery(this),
							url_param_str = '',
							url_param_sep = '&';

						if(jQuery(this).closest('.woocase-quick-look-details-data footer').find('.woocase-quantity-input').length > 0){
							url_param_str += url_param_sep + 'quantity=' + jQuery(this).closest('.woocase-quick-look-details-data footer').find('.woocase-quantity-input').val();
						}

						if(jQuery(this).closest('.woocase-addToCart-btn').find('.woocase-addtocart-preloader').length <= 0){
							woocase_addtocart_preloader.prependTo(jQuery(this).closest('.woocase-addToCart-btn'));
						}

						jQuery(this).closest('.woocase-addToCart-btn').find('.woocase-addtocart-preloader').fadeIn();
						jQuery(this).closest('.woocase-addToCart-btn').find('.woocase-addToCart-btn a.woocase-addtocart-url');

						jQuery.ajax({
							 url: woocase_cart_url + url_param_str,
							 success: function(result){
							 	if(self.closest('.woocase-addToCart-btn').find('.woocase-addtocart-url').length <= 0){
								 	woocase_addtocart_url.prependTo(self.closest('.woocase-addToCart-btn'));
								 }

							    self.closest('.woocase-addToCart-btn').find('img.woocase-addtocart-preloader').hide();
							    self.closest('.woocase-addToCart-btn').find('a.woocase-addtocart-url').fadeIn();
							    self.removeClass('woocase-ajax-btn-sp');

							    setTimeout(function(){
							    	self.closest('.woocase-addToCart-btn').find('a.woocase-addtocart-url').fadeOut();
							    }, 5000);
						    },
						    error: function(error){
						     // console.log(error);
						    }
						});
					}
				});
			}

			woocase_add_to_cart();
		}

		// Woocase Quick Look
		if(jQuery('a.woocase-quick-look').exists()){
			function woocase_quick_look(){
				jQuery(document).on('click', 'a.woocase-quick-look', function(e){
					e.preventDefault();



					var woocase_post_id = jQuery(this).attr('woocase-data-post-id'),
						woocase_addtocart_preloader = jQuery('<img src="'+ woocase_ajax.woocase_site_dir +'/assets/images/woocase-addtocart-preloader.gif" alt="" class="woocase-addtocart-preloader">'),
						self = jQuery(this);



					if(jQuery(this).find('.woocase-addtocart-preloader').length <= 0){
						woocase_addtocart_preloader.prependTo(jQuery(this));
					}


					jQuery(this).find('.woocase-search-icon-img').addClass('woocase-quick-look-ajax-preload');

					jQuery(this).find('img.woocase-addtocart-preloader').fadeIn();
					
					jQuery.ajax({
						url:  woocase_ajax.ajax_url,
						type : 'POST',
						data : {
							action : 'woocase_quick_look',
		        			'woocase_quick_look_id': woocase_post_id
						},
						 success: function(result){
						 	// console.log(result);
							 jQuery.magnificPopup.open({
							  items: {
							    src: result
							  },
							  type: 'inline',
							  zoom: {
								    enabled: true, // By default it's false, so don't forget to enable it

								    duration: 300, // duration of the effect, in milliseconds
								    easing: 'ease-in-out', // CSS transition easing function

								    // The "opener" function should return the element from which popup will be zoomed in
								    // and to which popup will be scaled down
								    // By defailt it looks for an image tag:
								    opener: function(openerElement) {
								      // openerElement is the element on which popup was initialized, in this case its <a> tag
								      // you don't need to add "opener" option if this code matches your needs, it's defailt one.
								      return openerElement.is('#woocase-quick-look-popup') ? openerElement : openerElement.find('#woocase-quick-look-popup');
								    }
								  }
							});

							 if (typeof popup_owl_carousel_activation != 'undefined' && jQuery.isFunction(popup_owl_carousel_activation)) {
								 popup_owl_carousel_activation();
							}



							self.find('.woocase-search-icon-img').removeClass('woocase-quick-look-ajax-preload');
						    self.find('img.woocase-addtocart-preloader').hide();
					    },
					    error: function(error){
					     // console.log(error);
					    }
					});
				});
			}

			woocase_quick_look();
		}

		function popup_owl_carousel_activation(){
			var $this = jQuery(".woocase-inner-popup-gallery");
	    		$this.owlCarousel({
			       
			        nav: false,
			        slideSpeed : 300,
			        paginationSpeed : 400,
			        center: true,
			        items:1,
			        loop:false,
			        touchDrag: true,
			        mouseDrag: true,
			        autoHeight: false
			      
			    });

			    $this.next().find('.prev').on('click', function () {
			        $this.trigger('prev.owl.carousel');
			    });
			    $this.next().find('.next').on('click', function () {
			        $this.trigger('next.owl.carousel');
			    });
		}
	
	});
}(jQuery));