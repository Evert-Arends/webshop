<?php
/**
 * Created by PhpStorm.
 * User: Evert Arends
 * Date: 5-2-18
 * Time: 14:02
 * @property ProductModel ProductModel
 * @property  CategoryModel CategoryModel
 * @property  UserModel UserModel
 * @property  UserRole UserRole
 */

class home extends EmmaController
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
        $this->getText();
        Loader::view("templates/header.php");
        Loader::view("home/" . $page . ".php");
        Loader::view("templates/footer.php");

    }

    private function getText()
    {
        $this->ReturnData = "Ok dit is leuke tekst.";
    }

    public function testMethod()
    {
        $this->UserModel->setRole("ddss");


//        $products = new ProductsTable();
//        // Create new models.
//        $categoryModel = clone($this->CategoryModel);
//        $categoryModel2 = clone ($this->CategoryModel);
//
//        $categoryModel->setId(1);
//        $categoryModel2->setId(2);
//
//        $categoryModel2->setParent($products);
//
//
////        $product = $products->find("price", 0);
////        $product->Objects->price = 1200;
////        $product->save();
//        print_r($this->ProductModel->getId());
    }
}