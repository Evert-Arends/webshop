<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 13-2-18
 * Time: 19:34
 */

class profile extends EmmaController
{
    protected $ReturnData;
    protected $RandomProduct;
    protected $user;
    protected $userOrders;

    public function init()
    {
        Loader::model("ProductModel");
        Loader::model("OrderModel");
        Loader::setSnippet("sidebar_product", "templates/sidebar_product");

        require_once('./controllers/products/getProducts.php');
        require_once('./controllers/orders/getOrders.php');
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

    private function getUserOrders(){
        $orders = new getOrders();
        $orders->init();

        return $orders->getOrdersOnUsername($this->getUser()->id);
    }

    private function getUser(){
        return $this->request->User;
    }

    private function loadTemplateData()
    {
        $this->user = $this->getUser();
        $this->userOrders = $this->getUserOrders();
        $this->RandomProduct = $this->randomProduct();
    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("profile/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}