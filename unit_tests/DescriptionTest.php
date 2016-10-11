<?php

class DescriptionTest extends PHPUnit_Framework_TestCase
{

    /**
     * Tests if the output of description is correct, by using cached file html
     */
    public function testGet()
    {
        $html_content = @file_get_html(__DIR__ . "/../cache/sainsburys-apricot-ripe---ready-320g.html");
        $description = new \Model\Description($html_content);
        $expected_description = "Buy Sainsbury's Apricot Ripe & Ready x5 online from Sainsbury's, the same great quality, freshness and choice you'd find in store. Choose from 1 hour delivery slots and collect Nectar points.";
        $this->assertEquals($expected_description, $description->get());
    }

}