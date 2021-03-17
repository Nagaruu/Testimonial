<?php

namespace AHT\Testimonials\Model\ResourceModel\Testimonials;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'AHT_Testimonials_post';
    protected $_eventObject = 'testimonials_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('AHT\Testimonials\Model\Testimonials', 'AHT\Testimonials\Model\ResourceModel\Testimonials');
    }

    // protected function _initSelect()
    // {
    //     $this->addFilterToMap('id','AHT_Testimonials_post.id');

    //     $this->getSelect()

    //         ->from(['aht_testimonial_blog' => $this->getMainTable()])

    //         ->join('aht_blog_author',

    //             'aht_testimonial_blog.author_id = aht_blog_author.author_id',

    //             [

    //                 'author_name'

    //             ]);
    //     return $this;
    // }
}