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

    /**
     * @return bool|int
     */
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

    /**
     * @param $category
     * @return bool|int
     */
    public function countProductsInCategory($category)
    {
        $sql = "SELECT id FROM `products` WHERE categories_id = ?";
        $result = $this->fetchAll($sql, array((int)$category));

        if ($result) {
            $total = count($result);
            return $total;
        } else {
            return false;
        }
    }

    /**
     * @param $searchKey
     * @return bool|int
     */
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

    /**
     * @param $category
     * @param $searchKey
     * @return bool|int
     */
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

    /**
     * @return array|bool
     */
    private function getProducts()
    {
        $sql = "SELECT * FROM `products`";
        $result = $this->fetchAll($sql);

        return $result;
    }

    /**
     * @return array|null
     */
    public function allProductsNotLimited()
    {
        $allIDS = $this->getProducts();

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    /**
     * @param $start
     * @param $perpage
     * @return array|bool
     */
    private function getAllProducts($start, $perpage)
    {
        $sql = "SELECT * FROM `products` LIMIT ?, ?";
        $result = $this->fetchAll($sql, array((int)$start, (int)$perpage));

        return $result;
    }

    /**
     * @param $start
     * @param $perpage
     * @return array|null
     */
    public function allProducts($start, $perpage)
    {
        $allIDS = $this->getAllProducts($start, $perpage);

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    /**
     * @param $category
     * @param $start
     * @param $perpage
     * @return array|bool
     */
    private function getAllProductsInCategory($category, $start, $perpage)
    {
        $sql = "SELECT * FROM `products` WHERE categories_id = ? LIMIT ?, ?";
        $result = $this->fetchAll($sql, array((int)$category, (int)$start, (int)$perpage));

        return $result;
    }

    /**
     * @param $category
     * @param $start
     * @param $perpage
     * @return array|null
     */
    public function allProductsInCategory($category, $start, $perpage)
    {
        $allIDS = $this->getAllProductsInCategory($category, $start, $perpage);

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    /**
     * @param $category
     * @param $searchKey
     * @param $start
     * @param $perpage
     * @return array|bool
     */
    private function getAllProductsInCategoryOnSearch($category, $searchKey, $start, $perpage)
    {
        $sql = "SELECT * FROM `products` WHERE name LIKE CONCAT('%', ?, '%') OR manufacturer LIKE CONCAT('%', ?, '%') OR description LIKE CONCAT('%', ?, '%') HAVING categories_id = ? LIMIT ?, ?";
        $result = $this->fetchAll($sql, array($searchKey, $searchKey, $searchKey, (int)$category, (int)$start, (int)$perpage));

        return $result;
    }

    /**
     * @param $category
     * @param $searchKey
     * @param $start
     * @param $perpage
     * @return array|null
     */
    public function allProductsInCategoryOnSearch($category, $searchKey, $start, $perpage)
    {
        $allIDS = $this->getAllProductsInCategoryOnSearch($category, $searchKey, $start, $perpage);

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    /**
     * @param $searchKey
     * @param $start
     * @param $perpage
     * @return array|bool
     */
    private function getAllProductsOnSearch($searchKey, $start, $perpage)
    {
        $sql = "SELECT * FROM `products` WHERE name LIKE CONCAT('%', ?, '%') OR manufacturer LIKE CONCAT('%', ?, '%') OR description LIKE CONCAT('%', ?, '%') LIMIT ?, ?";
        $result = $this->fetchAll($sql, array($searchKey, $searchKey, $searchKey, (int)$start, (int)$perpage));

        return $result;
    }

    /**
     * @param $searchKey
     * @param $start
     * @param $perpage
     * @return array|null
     */
    public function allProductsOnSearch($searchKey, $start, $perpage)
    {
        $allIDS = $this->getAllProductsOnSearch($searchKey, $start, $perpage);

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    /**
     * @return array|bool
     */
    private function getDiscountProducts()
    {
        $sql = "SELECT * FROM products JOIN product_has_discount ON products.id = product_has_discount.products_id LIMIT 4";
        $result = $this->fetchAll($sql);
        return $result;

    }

    /**
     * @return array|null
     */
    public function discountProducts()
    {
        $allIDS = $this->getDiscountProducts();

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    /**
     * @param $amount
     * @return array|bool
     */
    private function getRandomProducts($amount)
    {
        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT $amount";
        $result = $this->fetchAll($sql);
        return $result;

    }

    /**
     * @param $amount
     * @return array|null
     */
    public function randomProducts($amount)
    {
        $allIDS = $this->getRandomProducts($amount);

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    /**
     * @param $productId
     * @return array
     */
    public function getProductOnId($productId)
    {
        $sql = "SELECT * FROM `products` WHERE id = ?";
        $result = $this->fetchAll($sql, array((int)$productId));

        return $this->createModels($result);
    }

    /**
     * @param $IDS
     * @return array
     */
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