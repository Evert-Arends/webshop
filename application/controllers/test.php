<?php

/**
 * Created by PhpStorm.
 * User: berm
 * Date: 30-3-18
 * Time: 16:17
 *
 *
 */

/**
 * Test your php functions here to discover how they work.
 */
class test extends EmmaController
{

    public function init()
    {
        $ar = array("1" => "HEy!", "2" => "LOL!");
        var_dump($ar);

        $ar = array_replace($ar, array("1" => "HOI!"));

        var_dump($ar);

        Session::nullify("cart");
    }

}