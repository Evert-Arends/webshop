<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 10-2-18
 * Time: 10:51
 */

class product extends EmmaController
{
    protected $product;
    private $request;

    public function init($request)
    {
        $this->request = $request;
        // current directory
        require_once('./controllers/products/getProducts.php');
    }

    public function index()
    {
        $this->loadTemplateData();
        $this->page();
    }

    public function getProductId() {
        if (isset($this->request)) {
            $productId = $this->request->ID;
        } else {
            $productId = null;
        }
        return $productId;
    }

    public function getProduct($productId)
    {
        $product = new getProducts();
        $product->init();
        return $product->getProductOnId($productId);
    }

    private function loadTemplateData()
    {
        $this->product = $this->getProduct($this->getProductId());
    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("product/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}