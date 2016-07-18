<?php

/**
 * Class Products
 * Class responsible for store products
 * @copyright (c) 2016, Paulo Souza
 * @author PAULO
 */
class Products {
    
    public $product_list;
    
    var $ipd = ['sku'=>'ipd', 'name'=>'Super iPad', 'price'=>549.99, 'promotional'=>499.99];
    var $mbp = ['sku'=>'mbp', 'name'=>'MacBook Pro', 'price'=>1399.99, 'promotional'=>1399.99];
    var $atv = ['sku'=>'atv', 'name'=>'Apple TV', 'price'=>109.5, 'promotional'=>109.5];
    var $vga = ['sku'=>'vga', 'name'=>'VGA Adapter', 'price'=>30, 'promotional'=>30];
    
    public function __construct() {
        $this->product_list = [
            'ipd' => $this->ipd,
            'mbp' => $this->mbp,
            'atv' => $this->atv,
            'vga' => $this->vga
        ];
    }

    /**
     * 
     * Return all products
     * @return array
     */
    public function all() {
        return $this->product_list;
    }
    
}
