<?php
/*
 * This file is part of xcom-nl/hexspoor-export.
 *
 * (c) Kim Peeters <kim@x-com.nl>
  *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

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
