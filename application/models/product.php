<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 5-2-18
 * Time: 20:52
 * @property  CategoryModel CategoryModel
 */

class ProductModel extends EmmaModel
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $photo;
    private $manufacturer;
    private $category_id;
    private $category; // Only category objects
    private $discount;
    private $objectChecker;

    /**
     * return reference
     */
    public function __construct()
    {
        $this->objectChecker = new ObjectChecker();
        EmmaModel::__construct();
    }

    public function init()
    {
        Loader::model("CategoryModel");
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param mixed $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * @param null $id
     * @param null $name
     * @return $this|null
     */
    public function get($id = null, $name = null)
    {
        if (!$id && !$name) {
            trigger_error("At least one parameter required with requesting a product from the database.");
            return $this;
        }

        // Retrieve product from database
        $productsTable = new ProductsTable();
        $product = !$id ? $productsTable->find("name", $name) : $productsTable->find("id", $id);

        if (!$product) {
            return null; // Return null instead of model.
        }

        $this->setId($product->Objects->id);
        $this->setCategoryId($product->Objects->categories_id);
        $this->setName($product->Objects->name);
        $this->setDescription($product->Objects->description);
        $this->setManufacturer($product->Objects->manufacturer);
        $this->setPhoto($product->Objects->photo);
        $this->setPrice($product->Objects->price);
        $this->setDiscount($this->setDiscountFromDB());
        $this->buildCategoryTree($this->getCategoryId());

        return $this;
    }

    /**
     * @return string|null
     */
    private function setDiscountFromDB()
    {
        $productDiscount = new product_has_discount();
        $discount = $productDiscount->find("products_id", $this->getId());
        if (!$discount) {
            $this->setDiscount(null);
        }

        return $discount->Objects->discount;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param CategoryModel $category
     */
    public function setCategory($category)
    {
        $check = $this->objectChecker->typeMatcher(New CategoryModel(), $category);
        if (!$check) {
            trigger_error("Category must be a/an " . get_class(New CategoryModel()) . " object.");
        } else {
            $this->category = $category;
        }
    }

    /**
     * @param integer $category_id
     * @return bool
     */
    private function buildCategoryTree($category_id)
    {
        $categoryModel = clone($this->CategoryModel);
        $categoryTable = new CategoriesTable();
        $category = $categoryTable->find("id", $category_id);

        if (!$category) {
            return false;
        }

        $categoryModel->setId($category_id);
        $categoryModel->setName($category->Objects->name);
        $categoryModel->setDescription($category->Objects->description);

        $this->setCategory($categoryModel);

        return true;
    }
}