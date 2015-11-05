<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 05/11/15
 * Time: 20:44
 */

namespace AppBundle\ValueObj;

class Product {

    private $title;

    private $unitPrice;

    private $size;

    private $description;

    function __construct($title, $unitPrice, $size, $description)
    {
        $this->title = $title;

        if( is_double($unitPrice) === false || 0 > $unitPrice){
            throw new \InvalidArgumentException('Unit price must be a number bigger or equal to 0');
        }
        $this->unitPrice = $unitPrice;

        $this->size = $size;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
}