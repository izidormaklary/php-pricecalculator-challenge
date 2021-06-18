<?php

//setting class for getting name and id from customer, customerLoader generates objects
class Customer {
    private int $id;
    private string $name;


    public function __construct(int $id, string $name)
    {
        $this->id= $id;
        $this->name= $name;
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