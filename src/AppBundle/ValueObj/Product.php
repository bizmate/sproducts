<?php
/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 05/11/15
 * Time: 20:44
 */

namespace AppBundle\ValueObj;

/**
 * Class Product
 * @package AppBundle\ValueObj
 */
class Product {

    /**
     * @var
     */
    private $title;

    /**
     * @var string
     */
    private $unitPrice;

    /**
     * @var string
     */
    private $size;

    /**
     * @var
     */
    private $description;

    /**
     * @param $title
     * @param $unitPrice
     * @param $size
     * @param $description
     */
    function __construct($title, $unitPrice, $size, $description)
    {
        $this->title = $title;

        if( is_double($unitPrice) === false || 0 > $unitPrice){
            throw new \InvalidArgumentException('Unit price must be a number bigger or equal to 0');
        }
        $this->unitPrice = number_format($unitPrice, 2);

        $this->size = round( $size/1024 , 2 ) . 'kb';
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