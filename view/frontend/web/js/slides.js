require([
    'jquery',
    'Magento_Ui/js/modal/modal',
    'mage/cookies'
], function ($, modal) {
    
    $(document).ready(function () {
        $(".vectra-minicartSlider .showcart").click(function(event) {
            event.preventDefault();

            var options = {
                type: 'slide',
                responsive: true,
                innerScroll: true,
                modalClass: 'minicartSlideOpen',
                responsive: true,
                timeout: '2000',
                closeOnMouseLeave: false,
                closeOnEscape: true,
                buttons: []
            };

            var modal = $('.block.block-minicart').modal(options);
            modal.modal('openModal');

            $('.action.viewcart').parent().parent().addClass('vectra-viewEditCart')

            if ($('.subtitle.empty').length > 0) {
                $('minicartCms').appendTo('.subtitle.empty')
            }

            return false;
        })
    });

});
