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
    private $all_kids;

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
            $this->createCategory();
        }
    }


    /**
     * @return array|string
     */
    private function getAllCategories()
    {
        $categories = new getCategories();
        $categories->init();
        return $categories->allCategories();
    }

    /**
     * Creates categorie with data from post request
     */
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

        $cat = $categories->checkIfCategoryExists($name);
        if ($cat) {
            return $this->ajax_msg("Category exists already!");
        }

        $category = new CategoryModel();
        $category->setName($name);
        if ($description) {
            $category->setDescription($description);
        } else {
            $category->setDescription("No description available.");
        }
        if (!$parent == 0) {
            $category->setParent($parent);
        }

        $category->create(true);

        return $this->ajax_msg("success");

    }


    /**
     * Edits category with data from post request
     */
    public function editCategory()
    {
        $category = $this->getPost("CategoryId");
        $name = $this->getPost("CategoryName");
        $categories = new getCategories();
        $catTable = new CategoriesTable();

        $catTable->find("id", $category);
        if (!$catTable) {
            return $this->ajax_msg("Could not find category!");
        }

        if ($name) {
            $cat = $categories->checkIfCategoryExists($name);
            if ($cat) {
                return $this->ajax_msg("Category with that name exists already!");
            }
            $catTable->Objects->name = $name;
            $catTable->save();
        }

        return $this->ajax_msg("success");
    }

    /**
     * Deletes category on ID
     */
    public function deleteCategory()
    {
        $category = $this->getPost("CategoryId");
        $to_delete = array();
        if ($category) {
            $categories = $this->getChildCategories($category);
            array_push($to_delete, (int)$category);

            foreach ($categories as $cat) {
                array_push($to_delete, $cat);
            }
        }

        $categoryMdl = new getCategories();
        $categoryMdl->removeLinkedCategories($to_delete);
        $categoryMdl->deleteCategories($to_delete);

        return $this->ajax_msg("success");
    }

    /**
     * @param $category_id
     * @return array
     */
    private function getChildCategories($category_id)
    {
        $this->all_kids = array();
        $categoryMdl = new getCategories();
        $categories = $categoryMdl->getChildren($category_id);

        if ($categories) {
            foreach ($categories as $cat) {
                if ($cat->getChildren()) {
                    $this->getChildCategories($cat->getId());
                }
                array_push($this->all_kids, $cat->getId());

            }
        }

        return $this->all_kids;
    }

    /**
     * @param $msg
     */
    private function ajax_msg($msg)
    {
        echo $msg;
    }

    /**
     * @param $param
     * @return mixed
     */
    private function getPost($param)
    {
        return $this->request->post[$param];
    }

    /**
     * @param $param
     * @return bool
     */
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