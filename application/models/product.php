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

    /**
     * return reference
     */
    public function __construct()
    {
        $this->init();
        return $ref =& $this;
    }

    private function init()
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

    public function get($id, $name)
    {
        if (!$id && !$name) {
            trigger_error("At least one parameter required with requesting a product from the database.");
            return $this;
        }

        // Retrieve product from database
        $productsTable = new ProductsTable();
        $product = $id ? $productsTable->find("name", $name) : $productsTable->find("id", $id);

        if (!$product) {
            return null; // Return null instead of model.
        }


    }

    private function buildCategoryTree($category_id)
    {
        $categoryModel = clone($this->CategoryModel);
        $categoryTable = new CategoriesTable();
        $category = $categoryTable->find("id", $category_id);

        if (!$category) {
            return null;
        }

        $categoryModel->setId($category_id);
        $categoryModel->setName($category->Objects->name);
        $categoryModel->setDescription($category->Objects->description);
    }
}