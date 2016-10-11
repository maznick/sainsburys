<?php

namespace Model;

use simple_html_dom;

class Parse
{

    /**
     * @var string The main url that will be used to be parsed
     */
    protected $url = 'http://hiring-tests.s3-website-eu-west-1.amazonaws.com/2015_Developer_Scrape/5_products.html';

    /**
     * @var null The html string that have been parsed
     */
    protected $html = null;

    /**
     * Parse constructor.
     */
    public function __construct()
    {
        $this->iniHtml();
    }

    /**
     * Initialize html string and set it to the appropriate value
     */
    protected function iniHtml()
    {
        try {
            $this->html = @file_get_html($this->url);
            if (empty($this->html)) {
                Error::printError('Page not found', true);
            }
        } catch (\Exception $e) {
            echo Error::getExceptionText($e);
        }
    }

    /**
     * Get products information array and transform it to json
     * @return string Products information to json
     */
    public function getProductsJson()
    {
        $products = null;
        try {
            $products = (new Products($this->getHtml()))->get();
        } catch (\Exception $e) {
            echo Error::getExceptionText($e);
        }
        return json_encode($products);
    }

    /**
     * Get the html object
     * @return simple_html_dom
     */
    public function getHtml()
    {
        return $this->html;
    }
}