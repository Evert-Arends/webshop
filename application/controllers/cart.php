<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 12-2-18
 * Time: 11:48
 */

class cart extends EmmaController
{
    protected $ReturnData;
    protected $RandomProduct;

    public function init()
    {
        Loader::model("ProductModel");
        Loader::setSnippet("sidebar_product", "templates/sidebar_product");
        // current directory
        require_once('./controllers/products/getProducts.php');
    }

    public function index()
    {
        $this->loadTemplateData();
        $this->page();
    }

    private function randomProduct()
    {
        $product = new getProducts();
        $product->init();

        return $product->randomProducts(1);
    }

    private function loadTemplateData()
    {
        $this->RandomProduct = $this->randomProduct();
    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("cart/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}