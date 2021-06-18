<?php
declare(strict_types = 1);

class HomepageController
{
    //render function
    public function render()
    {
        //make new product objects from productLoader
        $products= new Productloader();
        $products->getProducts();
        
        //make new customer objects from customerLoader
        $customers = new Customerloader();
        $customers ->getCustomers();

        //default values for view
        $name = "customer";
        $selProductPrice="";
        $fixedDisc="";
        $varDisc="";
        $finalPrice="";
        $ProductName="";
        $amount="";
        $volumeDisc="above 100pcs.";

        //when form submitted, get each value
        if (!empty($_POST['customer'])&&!empty($_POST['product'])) {

            //assigning values from posts
            $customerId= intval($_POST['customer']);
            $productId = intval($_POST['product']);
            $amount = $_POST['amount'];

            //when the amount is more than 100, volume discount
            if($amount>=100){
                $volumeDisc = "10%";
            }
            //find objects from each array
            $selCustomerObj= $customers->findCustomerById($customerId);
            $selProductObj = $products->findProdById($productId);

            //discount for specific customer
            $discount = new Discount();
            $discount->selectDiscount($customerId);
            
            //initiate calculate class
            $startCalc = new Calculate;
            
            //set view variables 
            $name = $selCustomerObj->getName();
            $selProductPrice= $selProductObj->getPrice();
            $fixedDisc=$discount->getFixedDiscount();
            $varDisc=$discount->getVariableDiscount();
            $finalPrice=$startCalc->getPrice($selProductObj, $discount, $amount);
            $ProductName = $selProductObj->getName();
        }

        //load the view
        require 'View/homepage.php';
    }
}