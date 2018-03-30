<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 30-3-18
 * Time: 17:33
 */


class editProducts extends EmmaModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        Loader::model("ProductModel");
    }

    public function editProduct($product)
    {
        echo "UPDATING PRODUCT.";
    }
}