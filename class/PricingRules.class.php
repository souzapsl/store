<?php

/**
 * Class PricingRules
 * @description Returns the rules for pricing on the Computer Store
 * @copyright (c) 2016, Paulo Souza
 * @author PAULO
 */
class PricingRules {
    
    /**
     * Rules for products with special treatment, eg 3 Apple TV for the price of 2
     * @var array 
     */
    private $rules = [
                        'atv' => [1=>1, 2=>2, 3=>2, 4=>3, 5=>4, 6=>4],
                        'ipd' => 5
                    ];
    /**
     * Return array to rule by SKU
     * @param string $sku
     * @return array
     */
    public function getRules($sku){
        if (!isset($this->rules[$sku])) {
            return false;
        }
        return $this->rules[$sku];
    }
    
    /**
     * Returns the final price of a product based on a rule
     * @param string $sku
     * @param integer $quantity
     * @param double $price
     * @param double $promotional
     * @return double
     */
    public function getPrice($sku, $quantity, $price, $promotional) {
        $rule = $this->getRules($sku);
        $price_final = 0;
        if (!$rule) {
            $price_final = ($quantity * $price);
        } else {
            if ($sku == 'atv') {
                $price_final = $this->getPriceAtv($quantity, $rule, $price);
            }
            if ($sku == 'ipd') {
                $price_final = $this->getPriceIpd($quantity, $rule, $price, $promotional);
            }
        }
        return $price_final;
    }
    
    /**
     * Returns the final price for Apple TV
     * @param int $quantity
     * @param array $rule
     * @param double $price
     */
    public function getPriceAtv($quantity, $rule, $price) {
        $price_atv = $rule[$quantity] * $price;
        return $price_atv;
    }
    
    /**
     * Returns the final price for Super iPad
     * @param int $quantity
     * @param array $rule
     * @param double $price
     * @param double $promotional
     * @return double
     */
    public function getPriceIpd($quantity, $rule, $price, $promotional) {
        $price_ipd = ($quantity >= $rule) ? ($quantity * $promotional) : ($quantity * $price);
        return $price_ipd;
    }
 
}
