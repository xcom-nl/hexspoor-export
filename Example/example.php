<?php

require_once '../vendor/autoload.php';

$settings = [
    'server' => 'xxxx.hexspoorwms.nl',
    'user' => 'xxxx',
    'pass' => 'xxxx',
    'code' => 'xxxx',
];

$transport = new \Hexspoor\Transport\FtpTransport($settings['server'], $settings['user'], $settings['pass']);
$transport->setDestinationPath('/');
$client = new \Hexspoor\Client($transport);

$order = new \Hexspoor\Data\Order($settings['code']);
$order->setOrderDetails((new \Hexspoor\Data\OrderDetails())
    ->setShopId(1)
    ->setTimestamp(time())
    ->setNote('')
    ->setShippingCosts(1.1));
$order->setCustomer((new \Hexspoor\Data\Customer()));
$order->setBillingAddress((new \Hexspoor\Data\BillingAddress())
    ->setCompanyName('TEST Company')
    ->setName('TEST Name')
    ->setStreetname('TEST Street')
    ->setHousenumber('TEST 1')
    ->setPostalcode('TEST 1111AA')
    ->setCity('TEST City')
    ->setCountry('TEST Nederland')
    ->setEmail('TEST xxxx@xxx.xx')
    ->setPhonenumber('TEST xxxx'));
$order->setShippingAddress((new \Hexspoor\Data\ShippingAddress())
    ->setCompanyName('TEST Company')
    ->setName('TEST Name')
    ->setStreetname('TEST Street')
    ->setHousenumber('TEST 1')
    ->setPostalcode('TEST 1111AA')
    ->setCity('TEST City')
    ->setCountry('TEST Nederland')
    ->setEmail('TEST xxxx@xxx.xx')
    ->setPhonenumber('TEST xxxx'));

$order->addProduct((new \Hexspoor\Data\Product())
    ->setId('xxxx')
    ->setAmount(2)
    ->setPrice(100)
);

$client->send($order);
