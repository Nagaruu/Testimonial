<?php

namespace AHT\Testimonials\Block\Frontend;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Index extends Template implements BlockInterface
{
    protected $_collection;
    public $_storeManager;
    public $_customerSession;

    public function __construct(
        \AHT\Testimonials\Model\ResourceModel\Testimonials\CollectionFactory $testimonialsCollectionFactory,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,  
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->_customerSession = $customerSession;
        $this->_collection =  $testimonialsCollectionFactory->create();
        echo "abc";
    }

    // public function getDataBlocks()
    // {
    //     $testimonials = $this->_collection;
    //     $items = $testimonials->getItems();
    //     foreach($items as $item)
    //     { 
    //         $itemData = $item->getData();
    //         $this->_loadedData[$item->getId()] = $itemData;
    //     }

    //     return $this->_loadedData;
    // }

    public function getStoreManager(){
        return $this->_storeManager;
    }
}