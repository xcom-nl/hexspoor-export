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

class Order
{
    /** @var OrderDetails */
    private $orderDetails;

    /** @var Customer */
    private $customer;

    /** @var BillingAddress */
    private $billingAddress;

    /** @var ShippingAddress */
    private $shippingAddress;

    /** @var string */
    private $hashCode;

    /** @var Product[] */
    private $products = array();

    /**
     * Order constructor.
     *
     * @param string $hashCode
     */
    public function __construct($hashCode)
    {
        $this->hashCode = $hashCode;
    }

    /**
     * @return string
     */
    public function getSecretHash()
    {
        $hash = $this->hashCode;
        foreach ($this->products as $product) {
            $hash .= $product->getId().$product->getAmount().$product->getPrice();
        }

        return sha1($hash);
    }

    /**
     * @return OrderDetails
     */
    public function getOrderDetails()
    {
        return $this->orderDetails;
    }

    /**
     * @param OrderDetails $orderDetails
     *
     * @return Order
     */
    public function setOrderDetails($orderDetails)
    {
        $this->orderDetails = $orderDetails;

        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return Order
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return BillingAddress
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param BillingAddress $billingAddress
     *
     * @return Order
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param ShippingAddress $shippingAddress
     *
     * @return Order
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product $product
     *
     * @return Order
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    public function __toXml()
    {
        $productsXml = '';
        foreach ($this->products as $product) {
            $productsXml .= $product->__toXml();
        }

        return <<<EOX
<?xml version="1.0" encoding="utf-8"?>
<hexspoororder hash="{$this->getSecretHash()}">
    {$this->orderDetails->__toXml()}
    {$this->customer->__toXml()}
    {$this->billingAddress->__toXml()}
    {$this->shippingAddress->__toXml()}
    <artikelen>
        {$productsXml}
    </artikelen>
</hexspoororder>
EOX;
    }
}
