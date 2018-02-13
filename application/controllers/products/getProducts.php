<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 10-2-18
 * Time: 13:55
 * @property  ProductModel ProductModel
 */

class getProducts extends EmmaModel
{
    public function init()
    {
        $this->ProductModel = Loader::model("ProductModel");
    }

    private function getAllProducts()
    {
        $sql = "SELECT id FROM products";
        $result = $this->fetchAll($sql);

        return $result;

    }

    public function createModels()
    {
        $this->init();
        $allIDS = $this->getAllProducts();
        $allProducts = array();
        if (!$allIDS) {
            return "No products found";
        }
        foreach ($allIDS as $value) {
            $productModel = clone($this->ProductModel);
            $productModel->get($value->id);

            if (!$productModel) {
                continue;
            }
            array_push($allProducts, $productModel);
        }
        return $allProducts;
    }

}