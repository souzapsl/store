<?php

require(dirname(__FILE__).'/'.'PricingRules.class.php'); 
/**
 * Class Cart
 * This class makes the operations for the cart
 * @copyright (c) 2016, Paulo Souza
 * @author PAULO
 */
class Cart extends PricingRules {
    
    public $product_sku;
    public $quantity;
    
    /**
     * Does the creation/update cart
     */
    public function update() {
        $this->product_sku = filter_input(INPUT_POST, 'product_sku');
        $this->quantity = filter_input(INPUT_POST, 'quantity');
        if($this->quantity) {
            $_SESSION[$this->product_sku] = $this->quantity;
        } else {
            unset($_SESSION[$this->product_sku]);
        }
    }
    
    /**
     * Returns the number of products in the cart 
     * @return int
     */
    public function getQuantity() {
        if (!isset($_SESSION) | !count($_SESSION) ) {
            return 0;
        }
        
        $quantity = 0;

        foreach ($_SESSION as $value) {
            if (!empty($value)) {
                $quantity += $value;
            }
        }
        
        return $quantity;
    }
    
    /**
     * Return the cart with all the information available
     * @return type
     */
    public function getCart() {
        if (!isset($_SESSION) | !count($_SESSION) ) {
            return;
        }
        return $_SESSION;
    }
    
    /**
     * Clear the cart
     */
    public function clear() {
        session_destroy();
    }
    
    /**
     * Returns the total gross value of the cart
     * @param array $products_list
     * @param array $cart_list
     * @return double
     */
    public function total($products_list, $cart_list) {
        if(!$cart_list) {
            return 0;
        }
        $total = 0;
        foreach ( $cart_list as $sku => $quantity ) {
           $total += ($products_list[$sku]['price'] * $quantity);
        }
        return $total;
    }
    
    /**
     * Returns the total value of the cart with the applied discount rules
     * @param array $cart_list
     * @param array $products_list
     * @return double
     */
    public function getTotalDiscount($cart_list, $products_list) {
        $total_discount = 0;
        if(is_array($cart_list)) {
            foreach ($cart_list as $sku => $quantity) {
                $total_discount += $this->getPrice($sku, $quantity, $products_list[$sku]['price'], $products_list[$sku]['promotional']);
            }
        }
        return $total_discount;
    }

    /**
     * Returns an array of values ready to display in cart
     * @param array $cart_list
     * @param array $products_list
     * @return array
     */
    public function render($cart_list, $products_list) {

        $product_list = [];
        if(is_array($cart_list)) {
            foreach ($cart_list as $sku => $quantity) {
                $product_list[$sku]['name'] = $products_list[$sku]['name'];
                $product_list[$sku]['price'] = $products_list[$sku]['price'];
                $product_list[$sku]['quantity'] = $quantity;
                $product_list[$sku]['price_total'] = $this->getPrice($sku, $quantity, $products_list[$sku]['price'], $products_list[$sku]['promotional']);
            }
        }
        return $product_list;
    }
    
}
