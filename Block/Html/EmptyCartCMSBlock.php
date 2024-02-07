<?php

/**
 * @author Karen Rumbie
 * @copyright Copyright © Karen Rumbie Creatives
 * @package KarenRumbie_MiniCartSlider
*/

namespace KarenRumbie\MiniCartSlider\Block\Html;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\View\Element\Template\Context;

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
        array $data = []
    ) {
        $this->_scopeConfig = $_scopeConfig;
        $this->_storeManager = $_storeManager;

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
     * Get data for minicart
     *
     * @return bool
    */
    public function getMiniCartBlockData()
    {
        $minicartCMSPath = $this->basePath . 'minicart_cms/minicart_cms_';
        $isMinicartBlockEnabled = $this->getConfigValue($minicartCMSPath . 'enable');
        $isMinicartBlockEnabled = $this->convertBoolVal($isMinicartBlockEnabled);
        $minicartContentId = $this->getConfigValue($minicartCMSPath . 'content');

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
