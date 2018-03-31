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
    private $parent;
    // Linked properties
    private $children = array(); // Must be null or a parent category object in an array

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
        return (string)$this->getId();
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


    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($parent_id)
    {
        $newModel = clone($this);
        $newModel->get($parent_id);
        $this->parent = $newModel;
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
        return $this;
    }

    private function getCategory($id = null, $name = null)
    {
        $category_getter = new CategoriesTable();
        return $id ? $category_getter->find("id", $id) : $category_getter->find("name", $name);
    }

    /**
     * @param $commit
     * @return void
     */
    public function create($commit)
    {
        $categoryTable = new CategoriesTable();


        $values = array(
            "name" => $this->getName(),
            "description" => $this->getDescription()
        );
        if ($commit) {
            $id = $categoryTable->insert(
                $values
            );

            $this->setId($id);
        }
        if ($this->getParent()) {
            $categoryHasCategory = new categories_has_categories();
            $nValues = array(
                "parent" => $this->getParent()->getId(),
                "child" => $this->getId()
            );
            if ($commit) {
                $categoryHasCategory->insert($nValues);
            }
        }
    }
}