/**
 * Theme Customizer custom scripts
 * Control of show/hide events on feature slider type selection
 */
(function($) {
    //Add Upgrade Button,Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links 
    $('.preview-notice').prepend('<span id="create_upgrade"><a target="_blank" class="button btn-upgrade" href="' + create_misc_links.upgrade_link + '">' + create_misc_links.upgrade_text + '</a></span>');
    jQuery('#customize-info .btn-upgrade, .misc_links').click(function(event) {
        event.stopPropagation();
    });

    /*
     * For Feature Slider on featured_slider_type click event
     */
    $('#accordion-panel-create_featured_slider .accordion-section-title').live( "click", function() {
        var value = $("#customize-control-featured_slider_type label select").val();

        if (value == 'demo-featured-slider') {
            $('#customize-control-featured_slide_number').hide();
        } else {
            $('#customize-control-featured_slide_number').show();
        }
        
        if( value == 'featured-page-slider' ) {
            $('[id*=customize-control-featured_slider_page]').show();
        }
        else {
            $('[id*=customize-control-featured_slider_page]').hide();
        }
    });

    $("#customize-control-featured_slider_type label select").live( "change", function() {
        var value = $(this).val();

        if (value == 'demo-featured-slider') {
            $('#customize-control-featured_slide_number').hide();
        } else {
            $('#customize-control-featured_slide_number').show();
        }

        if( value == 'featured-page-slider' ) {
            $('[id*=customize-control-featured_slider_page]').show();
        }
        else {
            $('[id*=customize-control-featured_slider_page]').hide();
        }
    });
})(jQuery);