<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 10-2-18
 * Time: 13:55
 */

class CategoryModel extends EmmaModel
{
    // Properties
    private $id;
    private $name;
    private $description;
    // Linked properties
    private $parent; // Must be null or a parent category object
    private $children = array(); // Must be null or a parent category object
    // Activate linking
    private $recursiveLinking;

    /**
     * return reference
     */
    public function __construct()
    {
        EmmaModel::__construct();
        return $ref =& $this;
    }

    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param array
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return bool
     */
    public function getRecursiveLinking()
    {
        return $this->recursiveLinking;
    }

    /**
     * @param bool $recursiveLinking
     */
    public function setRecursiveLinking($recursiveLinking)
    {
        $this->recursiveLinking = $recursiveLinking;
    }

    /**
     * @return integer
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
        $this->getAllCategories();
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param CategoryModel
     */
    public function setParent($parent)
    {
        // Enforce OOP
        if (is_object($parent)) {
            if (get_class($parent) == get_class($this)) {
                $this->parent = $parent;
            } else {
                trigger_error("Parent must be a/an " . get_class($this) . " object.");
            }
        } else {
            trigger_error("Parent must be an object.");
        }
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
     * At least one of the parameters needs to be set.
     * Fills this model with data from the database.
     * @param null $id
     * @param null $name
     * @return CategoryModel
     */
    public function get($id = null, $name = null)
    {
        if (!$id && !$name) {
            trigger_error("At least one parameter required with requesting a category from the database.");
            return $this;
        }
        $category = $this->getCategory($id, $name);

        if (!$category) {
            return null;
        }

        $this->setId($category->Objects->id);
        $this->setName($category->Objects->name);
        $this->setDescription($category->Objects->description);

        if($this->getRecursiveLinking()) {
            $this->getAllCategories();
        }

        return $this;
    }

    private function getAllCategories()
    {
        if ($this->getRecursiveLinking()) {
            $this->getMyParent();
            $this->getMyChildren();
        }
    }

    private function getCategory($id = null, $name = null)
    {
        $category_getter = new CategoriesTable();
        return $id ? $category_getter->find("id", $id) : $category_getter->find("name", $name);
    }

    /**
     * Check if this model has a parent category, and if so, add it to the model. This is recursive for every new
     * category model found.
     * @return null
     */
    private function getMyParent()
    {
        $parent = $this->getMyParentFromDB();

        if (!$parent) {
            return null;
        }

        $newCategoryTable = $this->getCategory($parent);
        if (!$newCategoryTable) {
            return null;
        }

        // Clone the existing object, and force the new object to retrieve his childs and roots.
        $newCategoryModel = clone($this);
        // Force the next object to get his links.
        $newCategoryModel->setRecursiveLinking(false);
        // Building model with database information
        $newCategoryModel->setId($newCategoryTable->Objects->id);
        $newCategoryModel->setName($newCategoryTable->Objects->name);
        $newCategoryModel->setDescription($newCategoryTable->Objects->description);
        // Set model as parent
        $this->setParent($newCategoryModel);

        return true;
    }

    /**
     * Check if this model has child categories, and if so, add it to the model. This is recursive for every new
     * category model found.
     * @return null
     */

    private function getMyChildren()
    {
        $children = $this->getMyChildrenFromDB($this->getId());

        foreach ($children as $child) {
            $newCategoryTable = $this->getCategory($child->child);

            if (!$newCategoryTable) {
                continue;
            }

            // Clone the existing object, and force the new object to retrieve its children.
            $newCategoryModel = clone($this);
            // Force the next object to get his links.
            $newCategoryModel->setRecursiveLinking(false);
            // Building model with database information
            $newCategoryModel->setId($newCategoryTable->Objects->id);
            $newCategoryModel->setName($newCategoryTable->Objects->name);
            $newCategoryModel->setDescription($newCategoryTable->Objects->description);
            // Set model as parent

            array_push($this->children, $newCategoryModel);
        }

        return true;
    }


    private function getMyParentFromDB()
    {
        $category_link_getter = new Categories_Has_Categories();
        $tempCategory = $category_link_getter->find("child", $this->getId());
        if(!$tempCategory){
            return null;
        }
        return $tempCategory->Objects->parent;
    }

    /**
     * @param integer $id
     * @return array|bool
     */
    private function getMyChildrenFromDB($id)
    {
        $sql = "SELECT child FROM categories_has_categories WHERE parent = ?";
        $result = $this->fetchAll($sql, array($id));

        return $result;
    }


}