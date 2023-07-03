<?php

/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_MiniCartSlider
 */

namespace Vectra\MiniCartSlider\Block\Cart;

use \Magento\Store\Model\ScopeInterface;

class MiniCartSlider extends \Magento\Checkout\Block\Cart\Sidebar
{
    /**
     * Returns value of config field at given path
     * 
     * @param string
     * 
     * @return mixed
    */
    public function getConfigValue($path)
    {
        return $this->_scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, $this->_storeManager->getStore()->getId());
    }

    /**
     * Returns if Mini cart Slider is enabled
     * 
     * @return bool
    */
    public function isMiniCartSliderEnabled()
    {
        $isMiniCartEnabled = $this->getConfigValue('minicartslider/config_general/minicartslider_enable');

        if ($isMiniCartEnabled == 1) {
            return true;
        }
        return false;
    }
}

