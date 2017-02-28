<?php

namespace Hexspoor\Data;

class BillingAddress extends Address
{
    protected function getType()
    {
        return 'factuur';
    }
}
