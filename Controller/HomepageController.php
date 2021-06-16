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
        if (!empty($_POST['customer'])&&!empty($_POST['product'])) {
            $customerId= intval($_POST['customer']);
            $productId = intval($_POST['product']);
            $customers->findCustomerById($customerId);

            Discount::selectDiscount($customerId,50000);
            // other searching function


        }

//        if (!$_POST['product']){
//            $products->findProdById();
//
//        }

        //this is just example code, you can remove the line below
        $user = new User('John Smith');

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';

    }
}