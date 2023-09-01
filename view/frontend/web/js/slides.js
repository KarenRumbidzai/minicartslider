require([
    'jquery',
    'Magento_Ui/js/modal/modal',
], function ($, modal) {

    $(".showcart").click(function(event) {
        
        event.preventDefault();
        if ($('body').hasClass('vectra-minicartSlider')) {
            $('.slider-modals-wrapper').addClass('minicart-overlay')

            if ($('.subtitle.empty').length > 0) {
                $('.minicartCms').appendTo('.subtitle.empty')
                $('.minicartCms').show()
            }
        }

    })

    $(document).on("click", ".minicart-overlay", function() {
        $('.slider-modals-wrapper').removeClass('minicart-overlay')
    });

});
