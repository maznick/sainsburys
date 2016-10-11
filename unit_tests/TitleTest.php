<?php

class TitleTest extends PHPUnit_Framework_TestCase
{

    /**
     * Tests if the output of title is correct, by using cached file html
     */
    public function testGet()
    {
        $html_content = @file_get_html(__DIR__ . "/../cache/sainsburys-apricot-ripe---ready-320g.html");
        $title = new \Model\Title($html_content);
        $this->assertEquals("Sainsbury's Apricot Ripe & Ready x5", $title->get());
    }

}