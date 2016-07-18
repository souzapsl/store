<?php

    session_start();
    /**
     *
     * @package Computer Store
     */
    require 'vendor/smarty/smarty/libs/Smarty.class.php';
    require 'class/Products.class.php';
    require 'class/Cart.class.php';
    require 'class/Util.class.php';

    $smarty = new Smarty;

    $smarty->assign("quantity_list", Util::listQuantity());
    
    $products = new Products();
    
    $products_list = $products->all();
    
    $smarty->assign("products", $products_list ) ;
    
    $cart = new Cart();
    
    if (filter_input(INPUT_POST, 'product_sku', FILTER_DEFAULT)) {
        $cart->update();
    }
    
    if (filter_input(INPUT_GET, 'clear_cart', FILTER_DEFAULT)) {
        $cart->clear();
        Util::redirectTo("index.php");
    }
    
    $cart_list = $cart->getCart();
    
    $smarty->assign('cart_list', $cart_list);
    
    $smarty->assign('cart_quantity', $cart->getQuantity());
   
    $smarty->assign('total', $cart->total($products_list, $cart_list));
    
    $smarty->assign('total_discount', $cart->getTotalDiscount($cart_list, $products_list));
    
    $cart_render = $cart->render($cart_list, $products_list);
    
    $smarty->assign('cart', $cart_render);

    $smarty->display('index.tpl');
