<?php


class Product
{
    private string $price;
    private string $name;
    private string $id;

    public function __construct(string $price, string $name, string $id)
    {
        $this->price= $price;
        $this->name= $name;
        $this->id= $id;
    }

}