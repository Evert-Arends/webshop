<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 31-3-18
 * Time: 11:13
 */

class editUsers extends EmmaModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        Loader::model("UserModel");
    }

    public function editProduct($product)
    {
        echo "UPDATING USER.";
    }
}