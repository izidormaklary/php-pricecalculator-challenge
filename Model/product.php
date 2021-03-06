<?php

//setting class for getting price, name and id from products, productLoader generates objects
class Product
{
    private int $price;
    private string $name;
    private int $id;

    public function __construct(int $price, string $name, int $id)
    {
        $this->price= $price;
        $this->name= $name;
        $this->id= $id;
    }

    public function getPrice():float
    {
        return $this->price/100;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->id;
    }

}