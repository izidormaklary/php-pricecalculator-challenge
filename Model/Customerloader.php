<?php
declare(strict_types = 1);

class Customerloader
{
    private array $customers;
    private $selectedCustomer;

    //loads customer objects based on the query and collects them in an array
    public function getCustomers()
    {
        //opening connection to the database
        $pdo = Connection::openConnection();
        //prepare->execute->fetch query
        $handle = $pdo->prepare('SELECT c.id, CONCAT_WS(" ",firstname, lastname)as name FROM customer c');      
        $handle->execute();
        $customers = $handle->fetchAll();
        //loop through the array of the results
        foreach ($customers as $customer) {
            //create objects with the specific data, and push them to the array of $customers
            $tempvar_custmer = new Customer(intval($customer['id']),$customer['name']);
            $this->customers []= $tempvar_custmer;
        }

    }
    // function that searches for the $_POST['customer']id in the array, then returns the right object
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