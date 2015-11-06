<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 05/11/15
 * Time: 20:18
 */

namespace AppBundle\Tests\ValueObj;

use AppBundle\ValueObj\Product;


class ProductTest extends \PHPUnit_Framework_TestCase{

    private $title;
    private $unitPrice;
    private $size;
    private $description;

    protected function setUp()
    {
        $this->title = 'product title';
        $this->unitPrice = 44.90;
        $this->size = 1536;
        $this->description = 'product description';
    }

    public function testProduct()
    {
        $product = new Product($this->title, $this->unitPrice, $this->size, $this->description);

        $this->assertEquals($this->title, $product->getTitle());
        $this->assertEquals(number_format($this->unitPrice,2), $product->getUnitPrice());
        $this->assertEquals('1.5kb', $product->getSize());
        $this->assertEquals($this->description, $product->getDescription());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Unit price must be a number bigger or equal to 0
     */
    public function testInvalidUnitPrice()
    {
        $product = new Product($this->title, -5, $this->size, $this->description);
    }
}