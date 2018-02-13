<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 10-2-18
 * Time: 14:52
 */

class overview extends EmmaController
{
    protected $ReturnData;
    protected $Products;

    public function init()
    {
        // current directory
        require_once('./controllers/products/getProducts.php');
    }

    public function index()
    {
        $this->loadTemplateData();
        $this->page();
    }

    public function productData()
    {
        $product = new getProducts();
        $product->init();

        return $product->createModels();
    }

    private function loadTemplateData(){
        $this->Products = $this->productData();
    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("overview/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}