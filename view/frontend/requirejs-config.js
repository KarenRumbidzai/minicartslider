var config = {
    deps: [
        "Vectra_MiniCartSlider/js/slides"
    ],
    config: {
        mixins: {
            'Magento_Checkout/js/view/minicart': {
                'Vectra_MiniCartSlider/js/minicart-mixin': true
            }
        }
    }
}