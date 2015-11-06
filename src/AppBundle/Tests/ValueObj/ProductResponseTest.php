<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 05/11/15
 * Time: 20:18
 */

namespace AppBundle\Tests\ValueObj;

use AppBundle\ValueObj\Product;
use AppBundle\ValueObj\ProductsResponse;


class ProductResponseTest extends \PHPUnit_Framework_TestCase{

    private $products;

    protected function setUp()
    {
        $product1 = new Product('title1', 22.7, 5756, 'description');
        $product2 = new Product('title2', 22.0, 5750, 'description 2');
        $this->products = array($product1, $product2);
    }

    public function testProductResponse()
    {
        $productsResponse = new ProductsResponse($this->products);

        $this->assertEquals(44.70, $productsResponse->getTotal());
        $this->assertGreaterThan(0, $productsResponse->getProducts());
        foreach($productsResponse->getProducts() as $product)
        {
            $this->assertInstanceOf('AppBundle\ValueObj\Product', $product);
        }
    }
}