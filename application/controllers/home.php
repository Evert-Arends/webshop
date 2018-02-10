<?php
/**
 * Created by PhpStorm.
 * User: Evert Arends
 * Date: 5-2-18
 * Time: 14:02
 * @property ProductModel ProductModel
 * @property  CategoryModel CategoryModel
 */

class home extends EmmaController
{
    protected $ReturnData;

    public function init()
    {
        try {
            Loader::model("ProductModel");
            Loader::model("CategoryModel");
        } catch (Exception $e) {
            print_r($e);
        }
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

        $categoryModel = clone($this->CategoryModel);
        $categoryModel2 = clone ($this->CategoryModel);

        $categoryModel->setId(1);
        $categoryModel2->setId(2);

        try {
            $categoryModel2->setParent($products);
        } catch (Exception $e) {
            echo $e;
        }

//        $product = $products->find("price", 0);
//        $product->Objects->price = 1200;
//        $product->save();
        print_r($this->ProductModel->getId());
    }
}