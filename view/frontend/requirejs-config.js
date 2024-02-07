var config = {
    deps: [
        "KarenRumbie_MiniCartSlider/js/slides"
    ],
    config: {
        mixins: {
            'Magento_Checkout/js/view/minicart': {
                'KarenRumbie_MiniCartSlider/js/minicart-mixin': true
            }
        }
    }
}