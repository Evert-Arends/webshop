<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 10-2-18
 * Time: 17:12
 */

class UserRole extends EmmaModel
{
    private $name;
    private $level;
    private $description;
    private $image;

    /**
     * return reference
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $name
     * @return $this|bool
     */
    public function getRole($name)
    {
        $rolesTable = new RolesTable();

        $role = $rolesTable->find("name", $name);
        if (!$role) {
            return false;
        }

        $this->name = $role->Objects->name;
        $this->level = $role->Objects->level;
        $this->description = $role->Objects->description;
        $this->image = $role->Objects->image;

        return $this;
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
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @param $commit
     * NOT READY YET
     */
    public function save($commit) {
        $roleTable = new RolesTable();
        $roleTable->Objects->name = $this->getName();
        $roleTable->Objects->level = $this->getLevel();
        $roleTable->Objects->description = $this->getDescription();
        $roleTable->Objects->image = $this->getImage();

        if($commit) {
            $roleTable->save();
        }


    }

}