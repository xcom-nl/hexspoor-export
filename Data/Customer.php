<?php

namespace Hexspoor\Data;

class Customer
{
    private $id;
    private $discount = 0;

    public function __toXml()
    {
        return <<<EOX
<klant>
    <id>{$this->id}</id>
    <korting>{$this->discount}</korting>
</klant>
EOX;
    }
}
