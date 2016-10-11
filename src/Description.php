<?php

namespace Model;

use simple_html_dom;

/**
 * Class Description
 * @package Model
 */
class Description extends ModelAbstract
{

    /**
     * @var string The html path to description
     */
    protected $path = 'meta[description]';

    /**
     * @var null Description that will be get
     */
    protected $description = null;

    /**
     * Description constructor. Initialize html and prepare data to set description
     * @param simple_html_dom $html
     */
    public function __construct(simple_html_dom $html)
    {
        parent::__construct($html);
        $this->prepareData();
    }

    /**
     * Prepare meta description to be set and set it
     */
    protected function prepareData()
    {
        $description = $this->html->find("meta[name='description']", 0)->content;
        $this->set($this->clearText($description));
    }

    /**
     * Set description
     * @param string $description
     */
    public function set($description)
    {
        $this->description = $description;
    }

    /**
     * Get the description after parse
     * @return string
     */
    public function get()
    {
        return $this->description;
    }
}