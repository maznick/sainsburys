<?php

class SizeTest extends PHPUnit_Framework_TestCase
{

    /**
     * Tests if the output of size is correct, by using cached file html
     */
    public function testGet()
    {
        $html_content = @file_get_html(__DIR__ . "/../cache/sainsburys-apricot-ripe---ready-320g.html");
        $size = new \Model\Size($html_content);
        $this->assertEquals('52.36kb', $size->get());
    }

}