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
     * Returns the code of the current store
     *
     * @return int
    */
    public function getStoreId()
    {
        return $this->_storeManager->getStore()->getId();
    }

    /**
     * Gets the path for the required variable as a paramated and returns the value for that path
     * from the db
     *
     * @param $path
     * @return mixed
    */
    public function getScopeValue($path)
    {
        return $this->_scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE,$this->getStoreId());
    }

    /**
     * Gets value for module enabled field from admin and converts and returns it as a boolean value
     *
     * @return bool
    */
    public function getModuleEnabled()
    {
        $configVal = $this->getScopeValue($this->basePath . 'minicartslider_enable');

        return $this->convertBoolVal($configVal);
    }

    /**
     * Get data for minicart
     *
     * @return bool
    */
    public function getMiniCartBlockData()
    {
        $minicartCMSPath = $this->basePath . 'minicart_cms/minicart_cms_';
        $isMinicartBlockEnabled = $this->getScopeValue($minicartCMSPath . 'enable');
        $isMinicartBlockEnabled = $this->convertBoolVal($isMinicartBlockEnabled);
        $minicartContentId = $this->getScopeValue($minicartCMSPath . 'content');

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
