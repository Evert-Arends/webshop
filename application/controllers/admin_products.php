<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 22-3-18
 * Time: 15:07
 */

class admin_products extends EmmaController
{
    protected $Products;


    public function init()
    {
        require_once('./controllers/products/getProducts.php');
    }

    public function index()
    {
        $this->adminData();
        $this->page();
    }

    public function productData()
    {
        $product = new getProducts();
        $product->init();

        return $product->allProductsNotLimited();
    }

    private function adminData()
    {
        $this->Products = $this->productData();
    }

    public function page($page = "index")
    {
        Loader::view("templates/admin_header.php");
        Loader::view("products/" . $page . ".php");
        Loader::view("templates/admin_footer.php");
    }
}