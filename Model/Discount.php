<?php

class Discount
{
    private array $VariableDiscounts = array();
    private int $fixedDiscount;

    public function selectDiscount($customer)
    {

        // query for customer
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare(
            'SELECT  c.fixed_discount as customerFixed, g.fixed_discount as groupFixed, c.variable_discount as customerVar, g.variable_discount as groupVar, g.parent_id as parentId
            FROM customer c
            left join customer_group g on c.group_id = g.id
            WHERE c.id = :id'
        );
        //looking for specific id
        $handle->bindValue(':id', $customer);
        $handle->execute();
        $discounts = $handle->fetch();

        //assigning values to the properties (first round)
        $this->VariableDiscounts[] = intval($discounts['groupVar']); //this is pushing to the array
        $this->fixedDiscount = intval($discounts['customerFixed']); // this is always increasing afterwards with the += operator, so we automatically get the sum of fixed discounts
        $this->fixedDiscount += intval($discounts['groupFixed']);

        // query for further groups (if there are). The loop goes further into parent group as long there is any.
        while (!empty($discounts['parentId'])) {
            $handle = $pdo->prepare(
                'SELECT  g.fixed_discount as groupFixed, g.variable_discount as groupVar, g.parent_id as parentId
               FROM  customer_group g
               WHERE g.id = :parentId'
            );

            //looking for the group where groupId = parentId, so the "parentgroup"
            $handle->bindValue(':parentId', $discounts['parentId']);
            $handle->execute();

            //in this step $discounts['parentId'] is overwritten to the parent id from the new query (so the while condition stays up to date)
            $discounts = $handle->fetch();

            // assigning the values from the current group
            $this->VariableDiscounts[] = intval($discounts['groupVar']);
            $this->fixedDiscount += intval($discounts['groupFixed']);
            

        }

    }

    // returning the highest discount from the array
    public function getVariableDiscount(): int
    {
        return max($this->VariableDiscounts);
    }

    // returning the (sum of) fixedDiscounts
    public function getFixedDiscount(): int
    {
        return $this->fixedDiscount;
    }

}

