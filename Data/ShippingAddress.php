<?php

namespace Hexspoor\Data;

class ShippingAddress extends Address
{
    protected function getType()
    {
        return 'bezorg';
    }
}
