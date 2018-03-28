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
    private $images;
    private $manufacturer;
    private $category_id;
    private $category; // Only category objects
    private $discount;
    private $objectChecker;
    private $retrieve_categories;


    /**
     * return reference
     */
    public function __construct()
    {
        parent::__construct();
        $this->objectChecker = new ObjectChecker();
    }

    public function init()
    {
        Loader::model("CategoryModel");
        Loader::model("ProductImageModel");
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
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param array $images , Models
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    private function getImagesFromDB($productId)
    {
        $sql = "SELECT photo_id FROM photos WHERE products_id = ?";
        $result = $this->fetchAll($sql, array($productId));

        return $result;
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

        # Set product info
        $this->setId($product->Objects->id);
        $this->setCategoryId($product->Objects->categories_id);
        $this->setName($product->Objects->name);
        $this->setDescription($product->Objects->description);
        $this->setManufacturer($product->Objects->manufacturer);

        # Retrieve product images
        $photoIDS = $this->getImagesFromDB($this->getId());
        $photos = $this->createPhotoModels($photoIDS);
        $this->setImages($photos);

        $this->setPrice($product->Objects->price);
        $this->setDiscount($this->getDiscountFromDB());
        if ($this->retrieve_categories) {
            $this->buildCategoryTree($this->getCategoryId());
        }
        return $this;
    }

    private function createPhotoModels($dbObject)
    {
        $models = array();
        if ($dbObject) {
            foreach ($dbObject as $item) {
                $tempModel = new ProductImageModel();
                $tempModel->fillModel($item->photo_id);
                array_push($models, $tempModel);
            }
        }
        return $models;
    }

    /**
     * @return string|null
     */
    private function getDiscountFromDB()
    {
        $productDiscount = new product_has_discount();
        $discount = $productDiscount->find("products_id", $this->getId());
        if (!$discount) {
            return null;
        } else {
            return $discount->Objects->discount;
        }
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
        $categoryModel = new CategoryModel;
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

    /**
     * @return mixed
     */
    public function getRetrieveCategories()
    {
        return $this->retrieve_categories;
    }

    /**
     * @param mixed $retrieve_categories
     */
    public function setRetrieveCategories($retrieve_categories)
    {
        $this->retrieve_categories = $retrieve_categories;
    }
}