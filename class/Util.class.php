<?php

/**
 * Class Util
 * It makes some operations / basic conversions
 * @copyright (c) 2016, Paulo Souza
 * @author PAULO
 */
class Util {
    /**
     * Redirect to url
     * @param string $url
     */
    public static function redirectTo($url){
        header("location:$url");
    }
    
    /**
     * Return list quantity to use on select
     * @return array
     */
    public static function listQuantity() {
        return array("0","1", "2", "3", "4", "5", "6");
    }
}
