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
        parent::__construct();
    }

    public function init()
    {
        Loader::model("ProductModel");
    }

    public function countProducts()
    {
        $sql = "SELECT id FROM `products`";
        $result = $this->fetchAll($sql);

        $total = count($result);
        if ($result) {
            return $total;
        } else {
            return false;
        }
    }

    public function countProductsInCategory($category)
    {
        $sql = "SELECT id FROM `products` WHERE categories_id = ?";
        $result = $this->fetchAll($sql, array((int)$category));

        $total = count($result);
        if ($result) {
            return $total;
        } else {
            return false;
        }
    }

    public function countProductsOnSearch($searchKey)
    {
        $sql = "SELECT id FROM `products` WHERE name LIKE CONCAT('%', ?, '%') OR manufacturer LIKE CONCAT('%', ?, '%') OR description LIKE CONCAT('%', ?, '%')";
        $result = $this->fetchAll($sql, array($searchKey, $searchKey, $searchKey));

        $total = count($result);
        if ($result) {
            return $total;
        } else {
            return false;
        }
    }

    public function countProductsInCategoryOnSearch($category, $searchKey)
    {
        $sql = "SELECT categories_id FROM `products` WHERE name LIKE CONCAT('%', ?, '%') OR manufacturer LIKE CONCAT('%', ?, '%') OR description LIKE CONCAT('%', ?, '%') HAVING categories_id = ?";
        $result = $this->fetchAll($sql, array($searchKey, $searchKey, $searchKey, (int)$category));

        $total = count($result);
        if ($result) {
            return $total;
        } else {
            return false;
        }
    }

    private function getProducts()
    {
        $sql = "SELECT * FROM `products`";
        $result = $this->fetchAll($sql);

        return $result;
    }

    public function allProductsNotLimited()
    {
        $allIDS = $this->getProducts();

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
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
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    private function getAllProductsInCategory($category, $start, $perpage)
    {
        $sql = "SELECT * FROM `products` WHERE categories_id = ? LIMIT ?, ?";
        $result = $this->fetchAll($sql, array((int)$category, (int)$start, (int)$perpage));

        return $result;
    }

    public function allProductsInCategory($category, $start, $perpage)
    {
        $allIDS = $this->getAllProductsInCategory($category, $start, $perpage);

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    private function getAllProductsInCategoryOnSearch($category, $searchKey, $start, $perpage)
    {
        $sql = "SELECT * FROM `products` WHERE name LIKE CONCAT('%', ?, '%') OR manufacturer LIKE CONCAT('%', ?, '%') OR description LIKE CONCAT('%', ?, '%') HAVING categories_id = ? LIMIT ?, ?";
        $result = $this->fetchAll($sql, array($searchKey, $searchKey, $searchKey, (int)$category, (int)$start, (int)$perpage));

        return $result;
    }

    public function allProductsInCategoryOnSearch($category, $searchKey, $start, $perpage)
    {
        $allIDS = $this->getAllProductsInCategoryOnSearch($category, $searchKey, $start, $perpage);

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    private function getAllProductsOnSearch($searchKey, $start, $perpage)
    {
        $sql = "SELECT * FROM `products` WHERE name LIKE CONCAT('%', ?, '%') OR manufacturer LIKE CONCAT('%', ?, '%') OR description LIKE CONCAT('%', ?, '%') LIMIT ?, ?";
        $result = $this->fetchAll($sql, array($searchKey, $searchKey, $searchKey, (int)$start, (int)$perpage));

        return $result;
    }

    public function allProductsOnSearch($searchKey, $start, $perpage)
    {
        $allIDS = $this->getAllProductsOnSearch($searchKey, $start, $perpage);

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    private function getDiscountProducts()
    {
        $sql = "SELECT * FROM products JOIN product_has_discount ON products.id = product_has_discount.products_id LIMIT 4";
        $result = $this->fetchAll($sql);
        return $result;

    }

    public function discountProducts()
    {
        $allIDS = $this->getDiscountProducts();

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    private function getRandomProducts()
    {
        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
        $result = $this->fetchAll($sql);
        return $result;

    }

    public function randomProducts()
    {
        $allIDS = $this->getRandomProducts();

        if (!$allIDS) {
            return NULL;
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
            $productModel = new ProductModel();
            $productModel->setRetrieveCategories(true);
            $productModel->fillModel($value);

//            $productModel->get($value->id);

            if (!$productModel) {
                continue;
            }
            array_push($products, $productModel);
        }
        return $products;
    }

}