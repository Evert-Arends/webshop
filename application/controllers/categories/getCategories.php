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

    private function getAllCategories()
    {
        $sql = "SELECT id FROM categories";
        $result = $this->fetchAll($sql);

        return $result;
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
            $categoryModel->get($value->id);

            if (!$categoryModel) {
                continue;
            }
            array_push($categories, $categoryModel);
        }
        return $categories;
    }
}