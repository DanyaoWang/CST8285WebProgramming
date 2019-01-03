<?php

Class menuItem
{
    private $itemName;
    private $description;
    private $price;

    public function getItemName()
    {
        return $this->itemName;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    function __construct($menu_itemName, $menu_description, $menu_price)
    {
        $this->itemName = $menu_itemName;
        $this->description = $menu_description;
        $this->price = $menu_price;
    }
}

?>