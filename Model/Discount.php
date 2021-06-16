<?php

require 'connection.php';

class Discount
{
    private array $groupVariableDiscounts = array();

    // the highest discount from group table max(arrayofgroupdiscounts)

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
        $this->groupVariableDiscounts[] = $discounts['groupVar'];
        // query for parent group if there is one
        while (!empty($discounts['parentId'])) {

            $handle = $pdo->prepare(
        'SELECT  g.fixed_discount as groupFixed, g.variable_discount as groupVar, g.parent_id as parentId
               FROM  customer_group g
               WHERE g.id = :parentId'
            );
            $handle->bindValue(':parentId', $discounts['parentId']);
            $handle->execute();
            //in this step $discounts['parentId'] is overwritten to
            $discounts = $handle->fetch();
            $this->groupVariableDiscounts[] = $discounts['groupVar'];
        }

//        $CF =$discounts['customerFixed'];
//        $GF =$discounts['groupFixed'];
//        $CV = ($price/100) * ($discounts['customerVar']/100);
//        $GV = ($price/100) * ($discounts['groupVar']/100);
//        var_dump($CF);
//        var_dump($GF);
//        var_dump($CV);
//        var_dump($GV);
    }
}

$trial = new Discount();
$trial->selectDiscount(17, 5000);