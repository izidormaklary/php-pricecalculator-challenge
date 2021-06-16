<?php

require 'connection.php';

class Discount
{
    // the highest discount from group table max(arrayofgroupdiscounts)
    private array $groupVariableDiscounts = array();

    public function selectDiscount($customer, $price)
    {

        // query for customer
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare(
    'SELECT  c.fixed_discount as customerFixed, g.fixed_discount as groupFixed, c.variable_discount as customerVar, g.variable_discount as groupVar, g.parent_id as parentId
            FROM customer c
            left join customer_group g on c.group_id = g.id
            WHERE c.id = :id'
        );
        $handle->bindValue(':id', $customer);
        $handle->execute();
        $discounts = $handle->fetch();

        //assigning values to the objects (first round)
        $this->groupVariableDiscounts[] = $discounts['groupVar'];
        //! ... more values to come: fixed discount from customer table, fixed discount from group table


        // query for further groups (if there are). The loop goes further into parent group as long there is any.

        while (!empty($discounts['parentId'])) {
            $handle = $pdo->prepare(
        'SELECT  g.fixed_discount as groupFixed, g.variable_discount as groupVar, g.parent_id as parentId
               FROM  customer_group g
               WHERE g.id = :parentId'
            );
            $handle->bindValue(':parentId', $discounts['parentId']);
            $handle->execute();

            //in this step $discounts['parentId'] is overwritten to the parent id from the new query (so the while condition stays up to date)
            $discounts = $handle->fetch();

            // assigning the values from the current group
            $this->groupVariableDiscounts[] = $discounts['groupVar'];

            //!... more values to come: fixed discount from group
            
        }

    }
}

$trial = new Discount();
$trial->selectDiscount(17, 5000);