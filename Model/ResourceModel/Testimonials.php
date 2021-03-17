<?php

namespace AHT\Testimonials\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Testimonials extends AbstractDb {
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	) {
		parent::__construct($context);
	}

	protected function _construct() {
		$this->_init('AHT_Testimonials_post', 'id');
	}
}