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
            $tempvar = new Product($product['price'],$product['name'] , $product['id']);
            $this->products []= $tempvar;
        }

    }
    // function that searches for the $_POST['product']id in the array
    public function findProdById(){

    }
}