<?php

/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_MiniCartSlider
*/

namespace Vectra\MiniCartSlider\Block\Html;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\View\Element\Template\Context;
use Vectra\MiniCartSlider\Block\Cart\MiniCartSlider;

class EmptyCartCMSBlock extends Template
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * @var StoreManagerInterface
     */
    protected $_storeManager;

    protected $basePath = 'minicartslider/config_general/';

    public function __construct(
        ScopeConfigInterface $_scopeConfig,
        StoreManagerInterface $_storeManager,
        Context $context,
        MiniCartSlider $miniCartSlider,
        array $data = []
    ) {
        $this->_scopeConfig = $_scopeConfig;
        $this->_storeManager = $_storeManager;
        $this->_miniCartSlider = $miniCartSlider;

        parent::__construct($context, $data);
    }

    /**
     * Converts the default value of a Yes/No admin field to a boolean value
     *
     * @param $val
     * @return bool
    */
    public function convertBoolVal($val)
    {
        if($val == 1){
            return true;
        }
        return false;
    }

    /**
     * Returns the code of the current store
     *
     * @return int
    */
    public function getStoreId()
    {
        return $this->_storeManager->getStore()->getId();
    }

    /**
     * Gets value for module enabled field from admin and converts and returns it as a boolean value
     *
     * @return bool
    */
    public function getModuleEnabled()
    {
        return $this->_miniCartSlider->isMiniCartSliderEnabled();
    }

    /**
     * Get data for minicart
     *
     * @return bool
    */
    public function getMiniCartBlockData()
    {
        $minicartCMSPath = $this->basePath . 'minicart_cms/minicart_cms_';
        $isMinicartBlockEnabled = $this->_miniCartSlider->getConfigValue($minicartCMSPath . 'enable');
        $isMinicartBlockEnabled = $this->convertBoolVal($isMinicartBlockEnabled);
        $minicartContentId = $this->_miniCartSlider->getConfigValue($minicartCMSPath . 'content');

        return [
            'enabled' => $isMinicartBlockEnabled,
            'contentId' => $minicartContentId,
        ];
    }

    /**
     * Get the identifier of the desired block and returns the HTML for the block as set up in admin
     *
     * @param $blockId
     * @return mixed
    */
    public function getCmsHtml($blockId)
    {
        return $this->getLayout()->createBlock('Magento\Cms\Block\Block')->setBlockId($blockId)->toHtml();
    }

}
