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
    private $parents = array(); // Must be null or a parent category object in an array
    private $children = array(); // Must be null or a parent category object in an array
    // Activate linking
    private $recursiveLinkingParent;
    private $recursiveLinkingChild;
    private $test;

    /**
     * return reference
     */
    public function __construct()
    {
        EmmaModel::__construct();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getId();
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
     * @return stdClass
     */
    public function getRecursiveLinking()
    {
        $obj = new stdClass();
        $obj->child = $this->recursiveLinkingChild;
        $obj->parent = $this->recursiveLinkingParent;
        return $obj;
    }

    /**
     * @param $child
     * @param $parent
     */
    public function setRecursiveLinking($child, $parent)
    {
        $this->recursiveLinkingChild = $child;
        $this->recursiveLinkingParent = $parent;
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
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * @param CategoryModel
     */
    public function setParents($parents)
    {
        // Enforce OOP
        if (is_object($parents)) {
            if (get_class($parents) == get_class($this)) {
                $this->parents = $parents;
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

        $this->getAllCategories();


        return $this;
    }

    private function getAllCategories()
    {
        $obj = $this->getRecursiveLinking();
        if ($obj->child) {
            $this->getMyChildren();
        } else if ($obj->parent) {
            $this->getMyParents();

        }
    }

    private function getCategory($id = null, $name = null)
    {
        $category_getter = new CategoriesTable();
        return $id ? $category_getter->find("id", $id) : $category_getter->find("name", $name);
    }

    /**
     * Check if this model has child categories, and if so, add it to the model. This is recursive for every new
     * category model found.
     * @return null
     */

    private function getMyChildren()
    {
        $children = $this->getMyChildrenFromDB($this->getId());

        if (!$children) {
            return false;
        }
        foreach ($children as $child) {
            $newCategoryTable = $this->getCategory($child->child);

            if (!$newCategoryTable) {
                continue;
            }

            // Clone the existing object, and force the new object to retrieve its children.
            $newCategoryModel = clone($this);
            // Force the next object to get his links.
            $newCategoryModel->setRecursiveLinking(true, false);
            // Building model with database information
            $newCategoryModel->setId($newCategoryTable->Objects->id);
            $newCategoryModel->setName($newCategoryTable->Objects->name);
            $newCategoryModel->setDescription($newCategoryTable->Objects->description);
            // Set model as parent

            array_push($this->children, $newCategoryModel);

//            $this->children = array_unique($this->children);
        }

        return true;
    }

    /**
     * Check if this model has child categories, and if so, add it to the model. This is recursive for every new
     * category model found.
     * @return null
     */

    private function getMyParents()
    {
        $parents = $this->getMyParentsFromDB($this->getId());
        if (empty($parents) || !$parents) {
            return false;
        }
        foreach ($parents as $parent) {
            if (empty($parent)) {
                continue;
            }
            $newCategoryTable = $this->getCategory($parent->parent);

            if (!$newCategoryTable) {
                continue;
            }

            // Clone the existing object, and force the new object to retrieve its children.
            $newCategoryModel = clone($this);
            // Force the next object to get his links.
            $newCategoryModel->setRecursiveLinking(false, false);
            // Building model with database information
            $newCategoryModel->setId($newCategoryTable->Objects->id);
            $newCategoryModel->setName($newCategoryTable->Objects->name);
            $newCategoryModel->setDescription($newCategoryTable->Objects->description);
            // Set model as parent
            if (!in_array($newCategoryModel, $this->parents)) {
                array_push($this->parents, $newCategoryModel);
            }

            // Remove the possible double inserted arrays
            $this->parents = array_unique($this->parents);
        }

        return true;
    }


    private function getMyParentsFromDB($id)
    {
        $sql = "SELECT DISTINCT(parent) FROM categories_has_categories WHERE child = ?";
        $result = $this->fetchAll($sql, array($id));
        return $result;
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