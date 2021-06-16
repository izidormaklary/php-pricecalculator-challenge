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
        if (isset($POST)) {
            $customers->findCustomerById(intval($_POST['customer']));
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