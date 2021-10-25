<?php
/**
 * Created by PhpStorm.
 * User: rere
 * Date: 21/11/17
 * Time: 14:19
 */

class Str{

    static function random($length){
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

}