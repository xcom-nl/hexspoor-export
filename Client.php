<?php

namespace Hexspoor;

use Hexspoor\Data\Order;
use Hexspoor\Transport\TransportInterface;

class Client
{
    private $transport;

    public function __construct(TransportInterface $transport)
    {
        $this->transport = $transport;
    }

    public function send(Order $order)
    {
        $this->transport->send($order->__toXml());
    }
}
