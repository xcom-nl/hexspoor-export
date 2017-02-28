<?php
/*
 * This file is part of xcom-nl/hexspoor-export.
 *
 * (c) Kim Peeters <kim@x-com.nl>
  *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Hexspoor\Data;

class Product
{
    /** @var int */
    private $id;

    /** @var int */
    private $discount = 0;

    /** @var int */
    private $amount;

    /** @var int Price in cents */
    private $price;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param int $discount
     *
     * @return Product
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return Product
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function __toXml()
    {
        return <<<EOX
<artikel>
    <artikelnummer>{$this->id}</artikelnummer>
    <korting>{$this->discount}</korting>
    <aantal>{$this->amount}</aantal>
    <regelprijs>{$this->price}</regelprijs>
</artikel>
EOX;
    }
}
