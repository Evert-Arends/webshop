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
        foreach ($allIDS as $id) {
            $productModel = clone($this->ProductModel);
            $productModel->get($id);
            if (!$productModel) {
                continue;
            }
            array_push($allProducts, $productModel);
        }
        print_r($allProducts);
        print_r((object)$allProducts[0]->getName());
    }

}