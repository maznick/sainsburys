<?php

namespace Model;

use simple_html_dom;

/**
 * Class Size
 * @package Model
 */
class Size extends ModelAbstract
{

    /**
     * @var null Size that will be get
     */
    protected $size = null;

    /**
     * Size constructor. Initialize html and set size
     * @param simple_html_dom $html
     */
    public function __construct(simple_html_dom $html)
    {
        parent::__construct($html);
        $this->prepareData();
    }

    /**
     * Prepare size to be set and set it.
     */
    protected function prepareData()
    {
        $size = $this->html->original_size/1024;
        $formatedSize = number_format($size, 2);
        $this->set($formatedSize . "kb");
    }

    /**
     * Set size
     * @param string $size
     */
    public function set($size)
    {
        $this->size = $size;
    }

    /**
     * Get the size after parse
     * @return string
     */
    public function get()
    {
        return $this->size;
    }
}