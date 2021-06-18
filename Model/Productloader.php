<?php
declare(strict_types = 1);

class Productloader
{
    public array $products;
    public $selectedProduct;

    //loads product objects based on the query and collects them in an array
    public function getProducts()
    {
        //opening connection to the database
        $pdo = Connection::openConnection();
        //prepare->execute->fetch query
        $handle = $pdo->prepare('SELECT id, name, price FROM product');
        $handle->execute();
        $products = $handle->fetchAll();
        //loop through the array of the results
        foreach ($products as $product) {
            //create objects with the specific data, and push them to the array of $Products
            $tempvar = new Product(intval($product['price']),$product['name'] , intval($product['id']));
            $this->products []= $tempvar;
        }
    }
    // function that searches for the $_POST['product']id in the array, then returns the right object
    public function findProdById(int $prodId){
        foreach($this->products as $element){
            if($prodId == $element->getId()){
                $this->selectedProduct = $element;
                return $element;
            }
        }
    }
    

}

