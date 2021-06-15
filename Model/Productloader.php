<?php
declare(strict_types = 1);

class Productloader
{
     public array $products;
//    private pdo $pdo;

    public function getProducts()
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT id, name, price FROM product');
        $handle->execute();
        $products = $handle->fetchAll();
        foreach ($products as $product) {
            $tempvar = new Product(/*int $price, string $name, int $id*/);
            $products []= $tempvar;
        }
        var_dump($this->products);
    }
    // function that searches for the $_POST['product']id in the array
    public function findProdById(){

    }
}