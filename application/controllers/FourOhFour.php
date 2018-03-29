<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 12-2-18
 * Time: 11:48
 */

class FourOhFour extends EmmaController
{
    protected $RandomProducts;
    protected $AllRootCategories;

    public function init()
    {
        // Load models
        Loader::model("ProductModel");
        Loader::model("CategoryModel");

        Loader::setSnippet("sidebar", "templates/sidebar");

        // Load specific external helpers
        require_once('./controllers/products/getProducts.php');
        require_once('./controllers/categories/getCategories.php');
    }

    public function index()
    {
        $this->loadTemplateData();
        $this->page();
    }

    private function randomProducts()
    {
        $product = new getProducts();
        $product->init();

        return $product->randomProducts(8);
    }

    private function getRootCategories(){
        $categories = new getCategories();
        $categories->init();
        return $categories->allRootCategories();
    }

    private function loadTemplateData()
    {
        $this->RandomProducts = $this->randomProducts();
        $this->AllRootCategories = $this->getRootCategories();
    }

    public function page()
    {
        Loader::view("templates/header.php");
        Loader::view("fourohfour.php");
        Loader::view("templates/footer.php");
    }
}