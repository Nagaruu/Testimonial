<?php
namespace AHT\Testimonials\Model;

class Testimonials extends \Magento\Framework\Model\AbstractModel {
    public function __construct(
   	 \Magento\Framework\Model\Context $context,
   	 \Magento\Framework\Registry $registry,
   	 \Magento\Framework\Model\ResourceModel\AbstractResource $resource =
   	 null,
   	 \Magento\Framework\Data\Collection\AbstractDb $resourceCollection =
   	 null,
   	 array $data = []
    ) {
   	 parent::__construct($context, $registry, $resource,$resourceCollection, $data);
    }
    
    public function _construct() {
		$this->_init('AHT\Testimonials\Model\ResourceModel\Testimonials');
    }
}