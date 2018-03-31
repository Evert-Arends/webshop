<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 30-3-18
 * Time: 23:21
 */

class admin_crud_categories extends EmmaController
{
    protected $product;
    protected $allCategories;
    protected $msg;

    public function init()
    {
        Loader::model("CategoryModel");
        Loader::model("getCategories", "/controllers/categories/");
    }

    public function index()
    {
        if ($this->checkPost("edit_category")) {
            $this->editCategory();
        } elseif ($this->checkPost("delete_category")) {
            $this->deleteCategory();
        } elseif ($this->checkPost("create_category")) {
            var_dump($this->request->post);
            $this->createCategory();
        }
        var_dump($this->request->post);

    }


    private function getAllCategories()
    {
        $categories = new getCategories();
        $categories->init();
        return $categories->allCategories();
    }

    public function createCategory()
    {
        $parent = $this->getPost("parent");
        $name = $this->getPost("name");
        $description = $this->getPost("desc");

        if (!$parent) {
            return $this->ajax_msg("Missing parent!");
        } elseif (!$name)
            return $this->ajax_msg("Missing name");

        $categories = new getCategories();

        $cat = $categories->checkIfCategoryExists($parent);
        if ($cat) {
            return $this->ajax_msg("Category exists already!");
        }

        $category = new CategoryModel();
        $category->setName($name);
        if($description) {
            $category->setDescription($description);
        } else {
            $category->setDescription("No description available.");
        }

        $category->create(true);

        return $this->ajax_msg("success");

    }


    public function editCategory()
    {

    }

    public function deleteCategory()
    {

    }

    private function ajax_msg($msg)
    {
        echo $msg;
    }

    private function getPost($param)
    {
        return $this->request->post[$param];
    }

    private function checkPost($param)
    {
        if (isset($this->request->post[$param]))
            return true;
        return false;
    }

    public function page($page = "index")
    {
        Loader::view("templates/admin_header.php");
        Loader::view("edit_product/" . $page . ".php");
        Loader::view("templates/admin_footer.php");
    }
}