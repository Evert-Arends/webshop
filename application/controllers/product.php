<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 10-2-18
 * Time: 10:51
 */

class product extends EmmaController
{
    protected $ReturnData;

    public function init()
    {
        // current directory
       require_once('./controllers/products/getProducts.php');
    }

    public function index()
    {
        $this->page();
    }

    public function productData()
    {
        $product = new getProducts();
        $product->init();
        $product->allProducts();
        $this->ReturnData = $product;
        return $product;
    }

    public function page($page = "index")
    {
        $this->ReturnData = $this->productData();
        Loader::view("templates/header.php");
        Loader::view("product/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}