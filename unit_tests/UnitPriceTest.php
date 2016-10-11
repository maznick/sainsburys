<?php

class UnitPriceTest extends PHPUnit_Framework_TestCase
{

    /**
     * Tests if the output of unit price is correct, by using cached file html
     */
    public function testGet()
    {
        $html_content = @file_get_html(__DIR__ . "/../cache/sainsburys-apricot-ripe---ready-320g.html");
        $unit_price = new \Model\UnitPrice($html_content);
        $this->assertEquals(0.7, $unit_price->get());
    }

}