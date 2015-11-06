<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 06/11/15
 * Time: 03:14
 */

namespace AppBundle\ValueObj;


class ProductsResponse {

    /**
     * @var Product[]
     */
    private $products;

    private $total;

    function __construct( $products)
    {
        $this->products = $products;

        $this->total = 0;
        foreach($this->products as $product)
        {
            $this->total += (double)$product->getUnitPrice();
        }
        $this->total = number_format($this->total, 2);
    }

}