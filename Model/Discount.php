<?php

require 'connection.php';
class Discount
{

    public static function selectDiscount($customer,$price){
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT  c.fixed_discount as customerFixed, g.fixed_discount as groupFixed, c.variable_discount as customerVar, g.variable_discount as groupVar
        FROM customer c
        left join customer_group g on c.group_id = g.id
        WHERE c.id = :id'
        );
        $handle->bindValue(':id', $customer );
        $handle->execute();
        $discounts = $handle->fetch();
        $CF =$discounts['customerFixed'];
        $GF =$discounts['groupFixed'];
        $CV = ($price/100) * ($discounts['customerVar']/100);
        $GV = ($price/100) * ($discounts['groupVar']/100);
        var_dump($CF);
        var_dump($GF);
        var_dump($CV);
        var_dump($GV);
    }
}
Discount::selectDiscount(24,50000);