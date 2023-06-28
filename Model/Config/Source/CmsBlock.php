<?php
/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_MiniCartSlider
 */

namespace Vectra\MiniCartSlider\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class CmsBlock implements ArrayInterface
{
    /**
     * @var BlockRepositoryInterface
     */
    protected $blockRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    public function __construct(
        BlockRepositoryInterface $_blockRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->_blockRepository = $_blockRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * Gets and return list of configured blocks in DB
     *
     * @return \Magento\Cms\Api\Data\BlockInterface[]
     */
    private function getBlockList()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();
        return $this->_blockRepository->getList($searchCriteria)->getItems();
    }

    /**
     * Options getter for block content
     *
     * @return array
     */
    public function toOptionArray()
    {
        $blockList = $this->getBlockList();
        $optionsArray = [];

        foreach ($blockList as $block) {
            $blockData = ['value' => $block->getIdentifier(), 'label' => $block->getTitle()];
            array_push($optionsArray, $blockData);
        }

        return $optionsArray;
    }
}
