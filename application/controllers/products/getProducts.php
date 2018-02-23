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
    public function __construct()
    {
        EmmaModel::__construct();
        $this->init();
    }

    public function init()
    {
        $this->ProductModel = Loader::model("ProductModel");
    }

    public function countProducts()
    {
        $sql = "SELECT COUNT(*) AS Total FROM `products`";
        $result = $this->fetch($sql);

        return $result;
    }

    private function getAllProducts($start, $perpage)
    {
        $sql = "SELECT * FROM `products` LIMIT ?, ?";
        $result = $this->fetchAll($sql, array((int)$start, (int)$perpage));

        return $result;
    }

    public function allProducts($start, $perpage)
    {
        $allIDS = $this->getAllProducts($start, $perpage);

        if (!$allIDS) {
            return "No products found";
        }
        return $this->createModels($allIDS);
    }

    private function getDiscountProducts()
    {
        $sql = "SELECT products.id FROM products JOIN product_has_discount ON products.id = product_has_discount.products_id LIMIT 4";
        $result = $this->fetchAll($sql);
        return $result;

    }

    public function discountProducts()
    {
        $allIDS = $this->getDiscountProducts();

        if (!$allIDS) {
            return "No discount products found";
        }
        return $this->createModels($allIDS);
    }

    private function getRandomProducts()
    {
        $sql = "SELECT id FROM products ORDER BY RAND() LIMIT 4";
        $result = $this->fetchAll($sql);
        return $result;

    }

    public function randomProducts()
    {
        $allIDS = $this->getRandomProducts();

        if (!$allIDS) {
            return "No random products found";
        }
        return $this->createModels($allIDS);
    }

    public function getProductOnId($productId)
    {
        $sql = "SELECT * FROM `products` WHERE id = ?";
        $result = $this->fetchAll($sql, array((int)$productId));

        return $this->createModels($result);
    }

    private function createModels($IDS)
    {
        $products = array();
        foreach ($IDS as $value) {
            $productModel = clone($this->ProductModel);
            $productModel->get($value->id);

            if (!$productModel) {
                continue;
            }
            array_push($products, $productModel);
        }
        return $products;
    }

}