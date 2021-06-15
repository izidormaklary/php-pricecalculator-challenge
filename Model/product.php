<?php


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

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): string
    {
        return $this->id;
    }

}