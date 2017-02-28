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

abstract class Address
{
    private $companyName;
    private $department;
    private $name;
    private $streetname;
    private $housenumber;
    private $extraAddressInfo;
    private $postalcode;
    private $city;
    private $country;
    private $email;
    private $phonenumber;

    abstract protected function getType();

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     *
     * @return Address
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     *
     * @return Address
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return Address
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreetname()
    {
        return $this->streetname;
    }

    /**
     * @param mixed $streetname
     *
     * @return Address
     */
    public function setStreetname($streetname)
    {
        $this->streetname = $streetname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHousenumber()
    {
        return $this->housenumber;
    }

    /**
     * @param mixed $housenumber
     *
     * @return Address
     */
    public function setHousenumber($housenumber)
    {
        $this->housenumber = $housenumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtraAddressInfo()
    {
        return $this->extraAddressInfo;
    }

    /**
     * @param mixed $extraAddressInfo
     *
     * @return Address
     */
    public function setExtraAddressInfo($extraAddressInfo)
    {
        $this->extraAddressInfo = $extraAddressInfo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * @param mixed $postalcode
     *
     * @return Address
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     *
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return Address
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * @param mixed $phonenumber
     *
     * @return Address
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function __toXml()
    {
        return <<<EOX
<adres type="{$this->getType()}">
    <bedrijfsnaam>{$this->companyName}</bedrijfsnaam>
    <afdeling>{$this->department}</afdeling>
    <naam>{$this->name}</naam>
    <straat>{$this->streetname}</straat>
    <huisnummer>{$this->housenumber}</huisnummer>
    <extra_adresregel>{$this->extraAddressInfo}</extra_adresregel>
    <postcode>{$this->postalcode}</postcode>
    <plaats>{$this->city}</plaats>
    <land>{$this->country}</land>
    <email>{$this->email}</email>
    <telefoon>{$this->phonenumber}</telefoon>
</adres>
EOX;
    }
}
