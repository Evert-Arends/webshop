<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 10-2-18
 * Time: 13:55
 */

class CategoryModel extends EmmaModel
{
    private $id;
    private $name;
    private $description;
    private $parent; // Must be null or a parent category object

    /**
     * return reference
     */
    public function __construct()
    {
        return $ref =& $this;
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
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
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
     * One of the parameters needs to be filled.
     * Fills this model with data from the database.
     * @param null $id
     * @param null $name
     * @return CategoryModel
     */
    public function get($id=null, $name=null) {
        $category_getter = new CategoriesTable();
        if(!$id && !$name) {
            trigger_error("At least one parameter required with requesting a category from the database.");
            return $this;
        }
        $category = $id ? $category_getter->find("id", $id) : $category_getter->find("name", $name);

        if(!$category) {
            return $this;
        }

        $this->setId($category->Objects->id);
        $this->setName($category->Objects->name);
        $this->setDescription($category->Objects->description);

        return $this;
    }
}