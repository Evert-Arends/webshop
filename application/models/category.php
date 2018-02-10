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
}