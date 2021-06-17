<?php
declare(strict_types = 1);

class Productloader
{
    public array $products;
    public $selectedProduct;

    public function getProducts()
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT id, name, price FROM product');
        $handle->execute();
        $products = $handle->fetchAll();
        foreach ($products as $product) {
            $tempvar = new Product(intval($product['price']),$product['name'] , intval($product['id']));
            $this->products []= $tempvar;
        }
    }
    // function that searches for the $_POST['product']id in the array
    public function findProdById(int $prodId){
        foreach($this->products as $element){
            if($prodId == $element->getId()){
                $this->selectedProduct = $element;
                return $element;
            }
        }
    }

}

