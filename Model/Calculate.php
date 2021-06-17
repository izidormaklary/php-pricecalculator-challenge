<?php


class Calculate
{
public static function getPrice($prodObj,$discObj){
    $originalPrice = $prodObj->getPrice()/100;
    $fixedDiscount = $discObj->getFixedDiscount();
    $variableDiscount = $discObj->getVariableDiscount();
    $priceWithFixed= $originalPrice-$fixedDiscount;
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