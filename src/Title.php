<?php

namespace Model;

use simple_html_dom;

/**
 * Class Title
 * @package Model
 */
class Title extends ModelAbstract
{

    /**
     * The html path to title
     * @var string
     */
    protected $path = 'div[class=productTitleDescriptionContainer] h1';

    /**
     * Title that will be get
     * @var null
     */
    protected $title = null;

    /**
     * Title constructor. Initialize html and set title
     * @param simple_html_dom $html
     */
    public function __construct(simple_html_dom $html)
    {
        parent::__construct($html);
        $this->prepareData();
    }

    /**
     * Prepare title to be set from the parsed object and set it
     */
    protected function prepareData()
    {
        $parsedObject = $this->html->find($this->path);
        $titleObject = null;
        if (!empty($parsedObject) && !empty($parsedObject[0])) {
            $titleObject = $parsedObject[0];
        }
        $this->set($this->getText($titleObject));
    }

    /**
     * Set title
     * @param string $title
     */
    public function set($title)
    {
        $this->title = $title;
    }

    /**
     * Get the title after parse
     * @return string
     */
    public function get()
    {
        return $this->title;
    }
}