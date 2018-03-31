<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 22-3-18
 * Time: 15:07
 */

class admin_categories extends EmmaController
{
    protected $ReturnData;
    protected $AllRootCategories;

    public function init()
    {
        Loader::model("CategoryModel");
        Loader::model("getCategories", "/controllers/categories/");
    }

    public function index()
    {
        $this->template_data();
        $this->page();
    }

    /**
     * @return array|string
     */
    private function getCategories(){
        $categories = new getCategories();
        $categories->init();
        return $categories->allRootCategories();
    }

    public function template_data()
    {
        $this->AllRootCategories = $this->getCategories();
    }

    public function page($page = "index")
    {
        Loader::view("templates/admin_header.php");
        Loader::view("categories/" . $page . ".php");
        Loader::view("templates/admin_footer.php");
    }
}