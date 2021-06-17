<?php
declare(strict_types = 1);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {

        $products= new Productloader();
        $products->getProducts();
        #secondloader here
        $customers = new Customerloader();
        $customers ->getCustomers();

        $name = "customer";

        $selProductPrice="";
        $fixedDisc="";
        $varDisc="";
        $finalPrice="";
        $ProductName="";
        $amount="";
        $volumeDisc="above 100pcs.";

        if (!empty($_POST['customer'])&&!empty($_POST['product'])) {
            $customerId= intval($_POST['customer']);
            $productId = intval($_POST['product']);
            $amount = $_POST['amount'];
            if($amount>=100){
                $volumeDisc = "10%";
            }

            $selCustomerObj= $customers->findCustomerById($customerId);
            $selProductObj = $products->findProdById($productId);
            $selProductPrice= $selProductObj->getPrice();
            $discount = new Discount();
            $discount->selectDiscount($customerId);
            $fixedDisc=$discount->getFixedDiscount();
            $varDisc=$discount->getVariableDiscount();

            $name = $selCustomerObj->getName();
            $ProductName = $selProductObj->getName();

            $startCalc = new Calculate;
            $finalPrice=Calculate::getPrice($selProductObj, $discount, $amount);

            // other searching function
        }

         //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';

    }
}