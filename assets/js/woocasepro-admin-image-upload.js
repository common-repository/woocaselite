jQuery(document).ready( function( $ ) {

    jQuery('.woocase-uploaded-picture img.woocase-remove-icon').on('click', function(){
        jQuery(this).closest('#woocase_image_upload_single').find('#woocase_upload_image').val('');
        jQuery(this).closest('#woocase_image_upload_single').find('.woocase-uploaded-picture').fadeOut();
    });

    $( '#woocase_upload_image_button' ).on( 'click', function( event ) {
        event.preventDefault();

        var file_frame,
            self = jQuery(this);

        // if the file_frame has already been created, just reuse it
        if ( file_frame ) {
            file_frame.open();
            return;
        } 

        file_frame = wp.media.frames.file_frame = wp.media({
            title: $( this ).data( 'uploader_title' ),
            button: {
                text: $( this ).data( 'uploader_button_text' ),
            },
            multiple: false // set this to true for multiple file selection
        });

        file_frame.on( 'select', function() {
            attachment = file_frame.state().get('selection').first().toJSON();

            self.closest('#woocase_image_upload_single').find( '.woocase-image-src' ).attr('src', attachment.url).parent('.woocase-uploaded-picture').fadeIn();
            self.closest('#woocase_image_upload_single').find('#woocase_upload_image').val(attachment.url);
        });

        file_frame.open();
    });

});