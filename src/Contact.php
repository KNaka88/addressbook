<?php
class Contact
{
    private $first_name;
    private $middle_name;
    private $last_name;
    private $phone;
    private $address;

    function __construct($first_name, $last_name, $middle_name, $phone, $address)
    {
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->phone = $phone;
        $this->address = $address;
    }

    //GETTER and SETTER
    function getFirstName()
    {
        return $this->first_name;
    }

    function setFirstName($new_first_name)
    {
        $this->first_name = $new_first_name;
    }

    function getMiddleName()
    {
        return $this->middle_name;
    }

    function setMiddleName($new_middle_name)
    {
        $this->middle_name = $new_middle_name;
    }

    function getLastName()
    {
        return $this->last_name;
    }

    function setLastName($new_last_name)
    {
        $this->last_name = $new_last_name;
    }


    function getPhone()
    {
        return $this->phone;
    }

    function setPhone($new_phone)
    {
        $this->phone = $new_phone;
    }


    function getAddress()
    {
        return $this->address;
    }

    function setAddress($new_address)
    {
        $this->address = $new_address;
    }

    function createArray(){

    }

    //FUNCTION
    function save(){
      array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getAll(){
      return $_SESSION['list_of_contacts'];
    }

    static function deleteAll(){
      $_SESSION['list_of_contacts'] = array();
    }
}
