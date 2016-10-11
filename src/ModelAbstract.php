<?php

namespace Model;

use simple_html_dom;

use simple_html_dom_node;

/**
 * Class ModelAbstract Main methods for objects where this is extended
 * @package Model
 */
abstract class ModelAbstract
{

    /**
     * @var null The html url to get content
     */
    protected $html = null;

    /**
     * @var string The html path to value
     */
    protected $path = '';

    /**
     * ModelAbstract constructor.
     * @param \simple_html_dom $html
     */
    public function __construct(\simple_html_dom $html)
    {
        $this->iniParams($html);
    }

    /**
     * Initialize html value
     * @param \simple_html_dom $html
     */
    protected function iniParams(\simple_html_dom $html)
    {
        $this->html = $html;
    }

    /**
     * Trim and strip html tags to the given text
     * @param $text
     * @return string
     */
    public function clearText(string $text)
    {
        return trim(strip_tags(html_entity_decode($text, ENT_QUOTES)));
    }

    /**
     * Filter float from string
     * @param string $text
     * @return float
     */
    public function clearFloat(string $text)
    {
        return (float) preg_replace('/[^0-9\.]/', "", $text);
    }

    /**
     * Get the text if element exists
     * @param $element
     * @return string
     */
    public function getText(simple_html_dom_node $element)
    {
        if (!empty($element)) {
            return $this->clearText($element->text());
        }
        return '';
    }

    /**
     * Get the float if element exists
     * @param $element
     * @return float
     */
    public function getFloat(simple_html_dom_node $element)
    {
        if (!empty($element)) {
            return $this->clearFloat($element->text());
        }
        return 0.0;
    }

    /**
     * Prepare parsed object to be set
     * @return mixed
     */
    abstract protected function prepareData();

    /**
     * Set the specific value after parse
     * @param $value
     */
    abstract public function set($value);

    /**
     * Get specific value after parse
     */
    abstract public function get();



}