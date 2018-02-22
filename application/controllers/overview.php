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
    protected $productCount;

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

        $perpage = 16;

        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);

        if (isset($uri_segments)) {
            $page = $uri_segments[5];
        } else {
            $page = 1;
        }

        $calc = $perpage * $page;
        $start = $calc - $perpage;

        return $product->allProducts($start, $perpage);
    }

    public function countProducts(){
        $product = new getProducts();
        $product->init();

        return $product->countProducts();
    }

    private function loadTemplateData()
    {
        $this->Products = $this->productData();
        $this->productCount = $this->countProducts();
    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("overview/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}