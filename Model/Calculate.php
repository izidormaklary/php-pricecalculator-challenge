<?php


class Calculate
{
public static function getPrice($prodObj,$discObj,$amount){

    $price = $prodObj->getPrice()*$amount;
        if($amount>=100){
            $price = 0.9*$price;
        }
    $fixedDiscount = $discObj->getFixedDiscount();
    $variableDiscount = $discObj->getVariableDiscount();
    $priceWithFixed= $price-$fixedDiscount;
    if (empty($variableDiscount)) {
        $priceFinal = $priceWithFixed;
    }else{
        $priceFinal = $priceWithFixed * ((100 - $variableDiscount) / 100);
        if ($priceFinal<0){
            $priceFinal = 0;
        }
    }

    return number_format($priceFinal, 2);
}
}