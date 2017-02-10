<?php
class Contact
{
    private $name;
    private $phone;
    private $address;

    function __construct($name, $phone, $address)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    //GETTER and SETTER
    function getName()
    {
        return $this->name;
    }

    function setName($new_name)
    {
        $this->name = $new_name;
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
