<?php

namespace Model;

use simple_html_dom;

/**
 * Class UnitPrice
 * @package Model
 */
class UnitPrice extends ModelAbstract
{

    /**
     * @var string The html path to unit price
     */
    protected $path = 'p[class=pricePerMeasure]';

    /**
     * @var float Price that will be get
     */
    protected $price = 0.0;

    /**
     * Title constructor. Initialize html and set unit price
     * @param simple_html_dom $html
     */
    public function __construct(simple_html_dom $html)
    {
        parent::__construct($html);
        $this->prepareData();
    }

    /**
     * Prepare unit price to be set from the parsed object and set it.
     */
    protected function prepareData()
    {
        $parsedObject = $this->html->find($this->path);
        $priceObject = null;
        if (!empty($parsedObject) && !empty($parsedObject[0])) {
            $priceObject = $parsedObject[0];
        }
        $this->set($this->getFloat($priceObject));
    }

    /**
     * Set unit price
     * @param float $price
     */
    public function set($price)
    {
        $this->price = $price;
    }

    /**
     * Get the unit price after parse
     * @return float
     */
    public function get()
    {
        return $this->price;
    }
}