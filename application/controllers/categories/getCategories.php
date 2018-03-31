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
        Loader::model("CategoryModel");
        $this->CategoryModel = Loader::model("CategoryModel");
    }

    /**
     * @return array|bool
     */
    private function getAllRootCategories()
    {
        $sql = "SELECT * FROM categories WHERE id NOT IN (SELECT child FROM categories_has_categories)";
        $result = $this->fetchAll($sql);

        return $result;
    }

    /**
     * @return array|string
     */
    public function allRootCategories()
    {
        $allIDS = $this->getAllRootCategories();

        if (!$allIDS) {
            return "No categories found";
        }
        return $this->createModels($allIDS);
    }

    /**
     * @param $id
     * @return array|bool
     */
    public function getChildren($id)
    {

        $sql = "SELECT * FROM categories INNER JOIN categories_has_categories category ON categories.id = category.child WHERE parent = ?";
        $result = $this->fetchAll($sql, array($id));
        if ($result) {
            return $this->createModels($result);
        }
        return false;
    }

    /**
     * @return array|bool
     */
    private function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $result = $this->fetchAll($sql);

        return $result;
    }

    /**
     * @param $name
     * @return bool
     */
    public function checkIfCategoryExists($name)
    {

        $sql = "SELECT COUNT(id) AS total FROM categories WHERE name=?";
        $result = $this->fetch($sql, array($name));
        return $result ? ($result->total > 0 ? true : false) : false;
    }

    /**
     * @param $categories
     * @return bool
     */
    public function removeLinkedCategories($categories)
    {
        foreach ($categories as $category) {
            $sql = "DELETE FROM categories_has_categories WHERE child = ? OR parent = ?";
            $this->query($sql, array($category, $category));
        }

        return true;
    }

    /**
     * @param $categories
     */
    public function deleteCategories($categories)
    {
        $str = str_repeat('?,', count($categories) - 1) . '?';
        $sql = "DELETE FROM categories WHERE id IN (" . $str . ")";
        $this->fetchAll($sql, $categories);
    }

    /**
     * @return array|string
     */
    public function allCategories()
    {
        $allIDS = $this->getAllCategories();

        if (!$allIDS) {
            return "No categories found";
        }
        return $this->createModels($allIDS);
    }

    /**
     * @param $IDS
     * @return array
     */
    private function createModels($IDS)
    {
        $categories = array();
        foreach ($IDS as $value) {
            $categoryModel = new CategoryModel();

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