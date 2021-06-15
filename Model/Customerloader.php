<?php
declare(strict_types = 1);

class Customerloader
{
     public array $customers;
//    private pdo $pdo;

    public function getCustomers()
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT c.id, CONCAT_WS(" ",firstname, lastname)as name, c.fixed_discount as customerDiscount, g.fixed_discount as groupDiscount
        FROM customer c
        left join customer_group g on c.group_id = g.id');
       
        
        $handle->execute();
        $customers = $handle->fetchAll();
        foreach ($customers as $customer) {
            $tempvar_custmer = new Customer(intval($customer['id']),$customer['name'],
            intval($customer['customerDiscount']),intval($customer['groupDiscount']));
            $this->customers []= $tempvar_custmer;
        }

    }
    // function that searches for the $_POST['customer']id in the array
    public function findCustomerById($customer_id){
        // if(){

        // }

    }
}