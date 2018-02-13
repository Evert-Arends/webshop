<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 12-2-18
 * Time: 12:01
 * @property  CategoryModel CategoryModel
 */

class category extends EmmaController
{
    protected $ReturnData;

    public function init()
    {
        Loader::model("ProductModel");
        Loader::model("CategoryModel");
        Loader::model("UserModel");
        Loader::model("UserRole");
    }

    public function index()
    {
        $this->page();
    }

    public function page($page = "index")
    {
        $this->test_fill();
        Loader::view("templates/header.php");
        Loader::view("home/" . $page . ".php");
        Loader::view("templates/footer.php");

    }

    private function test_fill()
    {
        $test = $this->CategoryModel->get(1);
        print_r($test);
    }

}