<?php

class Customer {
    private int $id;
    private string $name;
    private int $Discount;

    public function __construct(int $id, string $name, int $customerDiscount ,int $groupDiscount)
    {
        $this->id= $id;
        $this->name= $name;
        $this->Discount= max($customerDiscount, $groupDiscount);

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