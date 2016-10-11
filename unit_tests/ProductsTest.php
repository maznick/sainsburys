<?php

class ProductsTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test the cached home.html and checks if any products exists.
     * It uses mock to get the html object
     */
    public function testNumberOfProducts()
    {
        $htmlObject = file_get_html(__DIR__ . '/../cache/home.html');
        $parse = $this->getMockBuilder(\Model\Parse::class)
            ->disableOriginalConstructor()
            ->setMethods(array('getHtml'))
            ->getMock();
        $parse->expects($this->once())->method('getHtml')->will($this->returnValue($htmlObject));
        $parseArray = json_decode($parse->getProductsJson(), true);
        $countResults = count($parseArray['results']);
        $this->assertGreaterThan(0, $countResults);
    }
}