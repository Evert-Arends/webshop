<?php

/**
 * Created by PhpStorm.
 * User: berm
 * Date: 28-3-18
 * Time: 6:38
 */
class AddressModel extends EmmaModel
{
    private $user_id;
    private $street;
    private $houseNumber;
    private $addition;
    private $postcode;

    /**
     * return reference
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {

    }

    public function fillModel($user_id)
    {
        $this->setUserId($user_id);
        $addressTable = new AddressTable();

        $addressTable->find("users_id", $user_id);

        if (!$addressTable->Objects) {
            return false;
        }

        $this->setStreet($addressTable->Objects->street);
        $this->setHouseNumber($addressTable->Objects->house_number);
        $this->setAddition($addressTable->Objects->addition);
        $this->setPostcode($addressTable->Objects->postalcode);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * @param mixed $houseNumber
     */
    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }

    /**
     * @return mixed
     */
    public function getAddition()
    {
        return $this->addition;
    }

    /**
     * @param mixed $addition
     */
    public function setAddition($addition)
    {
        $this->addition = $addition;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * Requires an userID
     * @param $commit
     * @return int
     */
    public function create($commit)
    {
        $photoTable = new AddressTable();


        $values = array(
            "users_id" => $this->getUserId(),
            "street" => $this->getStreet(),
            "house_number" => $this->getHouseNumber(),
            "addition" => $this->getAddition(),
            "postalcode" => $this->getPostcode(),
        );
        if ($commit) {
            $id = $photoTable->insert(
                $values
            );

            return $id;
        }
    }

}