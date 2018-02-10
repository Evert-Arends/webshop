<?php
/**
 * Created by PhpStorm.
 * User: Evert Arends
 * Date: 5-2-18
 * Time: 14:02
 * @property  ProductModel
 * @property ProductModel ProductModel
 */

class home extends EmmaController
{
    protected $ReturnData;
    public function init()
    {
        Loader::model("ProductModel");
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
        $products = new ProductsTable();
        $product = $products->find("price", 0);
        $this->fillProductModel();
        $product->Objects->price = 1200;
        $product->save();
    }

    private function fillProductModel()
    {
        $this->ProductModel->setId(1);
    }
}