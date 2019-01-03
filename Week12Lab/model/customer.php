<?php

class Customer
{
    private $name;
    private $phone;
    private $email;
    private $ref;

    function __construct($name, $phone, $email, $ref)
    {
        $this->setName($name);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setReferrer($ref);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getReferrer()
    {
        return $this->ref;
    }

    public function setReferrer($ref)
    {
        $this->ref = $ref;
    }

}

?>