<?php
declare(strict_types = 1);

class Calculate
{
    //calculation of the final price 
    public function getPrice($prodObj,$discObj,$amount) : string
    {

        //multiple amount
        $price = $prodObj->getPrice()*$amount;
            //more than 100, execute volume discount
            if($amount>=100){
                $price = 0.9*$price;
            }
        //assign each discount    
        $fixedDiscount = $discObj->getFixedDiscount();
        $variableDiscount = $discObj->getVariableDiscount();
        //first subtracting fixed discount
        $priceWithFixed= $price-$fixedDiscount;
        //if it's not 0, subtracting variable discount
        if (empty($variableDiscount)) {
            $priceFinal = $priceWithFixed;
        }else{
            $priceFinal = $priceWithFixed * ((100 - $variableDiscount) / 100);
        }

        //price can never be negative
        if ($priceFinal<0){
            $priceFinal = 0;
        }
        //return as string
        return number_format($priceFinal, 2);
    }
}