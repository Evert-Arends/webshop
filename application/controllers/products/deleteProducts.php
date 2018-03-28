<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 28-3-18
 * Time: 12:36
 */


class deleteProducts extends EmmaModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        Loader::model("ProductModel");
    }

    public function deleteProductOnId($productId)
    {
        $sql = "DELETE FROM `products` WHERE id = $productId";
        $this->query($sql);
        return true;
    }
}