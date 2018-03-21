<?php
/**
 * Created by PhpStorm.
 * User: Evert Arends
 * Date: 5-2-18
 * Time: 14:02
 * @property ProductModel ProductModel
 * @property  CategoryModel CategoryModel
 * @property  UserModel UserModel
 * @property  UserRole UserRole
 */

class home extends EmmaController
{
    protected $DiscountProducts;
    protected $RandomProducts;
    protected $AllRootCategories;

    public function init()
    {
        // Set route request
        // Load models
        Loader::model("ProductModel");
        Loader::model("CategoryModel");
        Loader::model("UserModel");
        Loader::model("UserRole");

        // Load specific external helpers
        require_once('./controllers/products/getProducts.php');
        require_once('./controllers/categories/getCategories.php');
    }

    public function index()
    {
        $this->loadTemplateData();
        $this->page();
    }

    private function discountProducts()
    {
        $product = new getProducts();
        $product->init();

        return $product->discountProducts();
    }

    private function randomProducts()
    {
        $product = new getProducts();
        $product->init();

        return $product->randomProducts();
    }

    private function getRootCategories(){
        $categories = new getCategories();
        $categories->init();
        return $categories->allRootCategories();
    }

    private function loadTemplateData()
    {
        $this->DiscountProducts = $this->discountProducts();
        $this->RandomProducts = $this->randomProducts();
        $this->AllRootCategories = $this->getRootCategories();
    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("home/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}