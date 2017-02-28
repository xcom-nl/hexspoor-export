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
