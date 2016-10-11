<?php

namespace Model;

use simple_html_dom;

use Model\ParseFinder;

/**
 * Class Products
 * @package Model
 */
class Products extends ModelAbstract
{

    /**
     * @var string The html path to value
     */
    protected $path = 'ul[class=productLister] li div[class=product] div[class=productInfo] h3 a';

    /**
     * @var array The products urls to be parsed for products information
     */
    protected $urls = [];

    /**
     * @var array The products information array
     */
    protected $products = [];

    /**
     * Products constructor. Set the products urls to be parsed and prepare data
     * @param simple_html_dom $html
     */
    public function __construct(simple_html_dom $html)
    {
        parent::__construct($html);
        $this->setProductsUrls();
        $this->prepareData();
    }

    /**
     * Set the products urls that will be used to be parsed
     */
    protected function setProductsUrls()
    {
        $this->urls = $this->html->find($this->path);
        if (empty($this->urls)) {
            Error::printError('No Products found', true);
        }
    }

    /**
     * Prepare products to be set and set them
     */
    protected function prepareData()
    {
        $products = array();
        foreach($this->urls as $url) {
            $html = @file_get_html($url->href);
            if (!empty($html)) {
                $products['results'][] = $this->getResults($html);
            } else {
                Error::printError('Url ' . $url->href . ' no longer exist.', false);
            }

        }
        $products['total'] = $this->getTotalPrice($products['results']);
        $this->set($products);
    }

    /**
     * Get the product's information into array
     * @param simple_html_dom $html
     * @return array
     */
    private function getResults(simple_html_dom $html)
    {
        $results = array(
            'title'         => (new Title($html))->get(),
            'size'          => (new Size($html))->get(),
            'unit_price'    => (new UnitPrice($html))->get(),
            'description'   => (new Description($html))->get(),
        );
        return $results;
    }

    /**
     * Get the total price of all products unit prices
     * @param array $results
     * @return float|int
     */
    private function getTotalPrice(array $results)
    {
        $totalPrice = 0;
        foreach($results as $result) {
            $totalPrice += (float)$result['unit_price'];
        }
        return $totalPrice;
    }

    /**
     * Set products
     * @param array $products
     */
    public function set($products)
    {
        $this->products = $products;
    }

    /**
     * Get products
     * @return array
     */
    public function get()
    {
        return $this->products;
    }
}