<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace AHT\Testimonials\Block\Adminhtml;

class Index extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_testimonials';
		$this->_blockGroup = 'AHT_Testimonials';
		$this->_headerText = __('Testimonials');
		$this->_addButtonLabel = __('Create New Testimonial');
		parent::_construct();
	}
}
