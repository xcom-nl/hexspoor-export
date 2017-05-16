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

class OrderDetails
{
    /** @var int */
    private $shopId;

    /** @var int */
    private $timestamp;

    /** @var int */
    private $reference;

    /** @var string */
    private $note;

    /** @var float */
    private $shippingCosts;

    /** @var string */
    private $paymentMethod = 'Pre-paid';

    /** @var string */
    private $payed = 'true';

    /** @var string */
    private $currency = 'EUR';

    /**
     * @return int
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * @param int $shopId
     *
     * @return OrderDetails
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;

        return $this;
    }

    /**
     * @return int
     * @return OrderDetails
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return int
     * @return OrderDetails
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param int $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return string
     * @return OrderDetails
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return float
     * @return OrderDetails
     */
    public function getShippingCosts()
    {
        return $this->shippingCosts;
    }

    /**
     * @param float $shippingCosts
     */
    public function setShippingCosts($shippingCosts)
    {
        $this->shippingCosts = $shippingCosts;

        return $this;
    }

    /**
     * @return string
     * @return OrderDetails
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @return string
     * @return OrderDetails
     */
    public function getPayed()
    {
        return $this->payed;
    }

    /**
     * @param string $payed
     */
    public function setPayed($payed)
    {
        $this->payed = $payed;

        return $this;
    }

    /**
     * @return string
     * @return OrderDetails
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    public function __toXml()
    {
        return <<<EOX
<bestelling>
    <shopid>{$this->shopId}</shopid>
    <timestamp>{$this->timestamp}</timestamp>
    <referentie>{$this->reference}</referentie>
    <opmerking>{$this->note}</opmerking>
    <verzendkosten>{$this->shippingCosts}</verzendkosten>
    <betaalmethode>{$this->paymentMethod}</betaalmethode>
    <betaald>{$this->payed}</betaald>
    <valuta>{$this->currency}</valuta>
</bestelling>
EOX;
    }
}
