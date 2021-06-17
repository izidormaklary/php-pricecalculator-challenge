<?php
declare(strict_types = 1);

class Customerloader
{
     private array $customers;
     private $selectedCustomer;
//    private pdo $pdo;

    public function getCustomers()
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT c.id, CONCAT_WS(" ",firstname, lastname)as name
                                        FROM customer c');
       
        
        $handle->execute();
        $customers = $handle->fetchAll();
        foreach ($customers as $customer) {
            $tempvar_custmer = new Customer(intval($customer['id']),$customer['name']);
            $this->customers []= $tempvar_custmer;
        }

    }
    // function that searches for the $_POST['customer']id in the array
    public function findCustomerById(int $id){
        foreach($this->customers as $customer) {
            if ($id == $customer->getId()) {
                $this->selectedCustomer = $customer;
                return $customer;
            }
        }
    }


    public function getCustomerArr()
    {
        return $this->customers;
    }

}