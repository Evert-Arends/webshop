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
        $sql = "SELECT id FROM categories WHERE id NOT IN (SELECT child from categories_has_categories)";
        $result = $this->fetchAll($sql);

        return $result;
    }

    public function allRootCategories($linkChild = false, $linkParent = false)
    {
        $allIDS = $this->getAllRootCategories();

        if (!$allIDS) {
            return "No categories found";
        }
        return $this->createModels($allIDS, $linkChild, $linkParent);
    }

    private function createModels($IDS, $linkChild = false, $linkParent = false)
    {
        $categories = array();
        foreach ($IDS as $value) {
            $categoryModel = clone($this->CategoryModel);
            $categoryModel->setRecursiveLinking($linkChild, $linkParent);
            $categoryModel->get($value->id);

            if (!$categoryModel) {
                continue;
            }
            array_push($categories, $categoryModel);
        }
        return $categories;
    }
}