<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 14-2-18
 * Time: 20:32
 * @property  CategoryModel CategoryModel
 */

class getCategories extends EmmaModel
{
    public function init()
    {
        $this->CategoryModel = Loader::model("CategoryModel");
    }

    private function getAllRootCategories()
    {
        $sql = "SELECT * FROM categories WHERE id NOT IN (SELECT child FROM categories_has_categories)";
        $result = $this->fetchAll($sql);

        return $result;
    }

    public function allRootCategories()
    {
        $allIDS = $this->getAllRootCategories();

        if (!$allIDS) {
            return "No categories found";
        }
        return $this->createModels($allIDS);
    }

    private function getChildren($id)
    {

        $sql = "SELECT * FROM categories INNER JOIN categories_has_categories category ON categories.id = category.child WHERE parent = ?";
        $result = $this->fetchAll($sql, array($id));
        if ($result) {
            return $this->createModels($result);
        }
        return false;
    }

    private function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $result = $this->fetchAll($sql);

        return $result;
    }

    public function checkIfCategoryExists($id) {

        $sql = "SELECT COUNT(id) as total FROM categories WHERE id=?";
        $result = $this->fetchAll($sql, array($id));
        return $result ? ($result->total > 0 ? true : false) : false;
    }

    public function allCategories()
    {
        $allIDS = $this->getAllCategories();

        if (!$allIDS) {
            return "No categories found";
        }
        return $this->createModels($allIDS);
    }

    private function createModels($IDS)
    {
        $categories = array();
        foreach ($IDS as $value) {
            $categoryModel = clone($this->CategoryModel);

            $children = $this->getChildren($value->id);

            $categoryModel->setId($value->id);
            $categoryModel->setName($value->name);
            $categoryModel->setDescription($value->description);
            $categoryModel->setChildren($children);

            if (!$categoryModel) {
                continue;
            }

            array_push($categories, $categoryModel);
        }
        return $categories;
    }
}