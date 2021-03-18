<?php
namespace AHT\Testimonials\Block\Frontend;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use AHT\Testimonials\Model\ResourceModel\Testimonials\Grid\CollectionFactory;

class Index extends Template implements BlockInterface
{
    protected $_collection;
    public $_storeManager;
    public $_customerSession;

    public function __construct(
        CollectionFactory $testimonialsCollectionFactory,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Model\Session $customerSession,  
        array $data = []

    )
    {
        parent::__construct($context, $data);
        $this->_customerSession = $customerSession;
        $this->_collection =  $testimonialsCollectionFactory->create();
    }

    public function getDataBlocks()
    {

        $portfolio = $this->_collection;
        $items = $portfolio->getItems();
        foreach($items as $item)
        { 
            $itemData = $item->getData();
            $this->_loadedData[$item->getId()] = $itemData;
        }

        return $this->_loadedData;
    }

    public function getStoreManager(){
        return $this->_storeManager;
    }
}