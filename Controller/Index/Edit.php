<?php

namespace AHT\Testimonials\Controller\Index;

use Magento\Framework\App\ResponseInterface;

class Edit extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;

    protected $testimonialsFactory;

    protected $coreRegistry;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \AHT\Testimonials\Model\TestimonialsFactory $testimonialsFactory,
        \Magento\Framework\Registry $coreRegistry
    )
    {
        $this->pageFactory = $pageFactory;
        $this->testimonialsFactory = $testimonialsFactory;
        $this->coreRegistry = $coreRegistry;

        return parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParams('id');
        $this->_coreRegistry->register('id', $id);

        return $this->_pageFactory->create();
    }
}
