<?php
declare(strict_types = 1);

class Customerloader
{
     public array $customers;
//    private pdo $pdo;

    public function getCustomers()
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT id, firstname, lastname, group_id, fixed_discount, variable_discount FROM customer');
        $handle->execute();
        $customers = $handle->fetchAll();
        foreach ($customers as $customer) {
            $tempvar_custmer = new Customer($customer['id'],$customer['firstname'],$customer['lastname'],$customer['group_id'],
                                            $customer['fixed_discount'],$customer['variable_discount']);
            $this->customers []= $tempvar_custmer;
        }

    }
    // function that searches for the $_POST['product']id in the array
    public function findCustomerById(){

    }
}