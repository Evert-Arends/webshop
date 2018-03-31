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
        Loader::model("ProductModel");
        Loader::model("CategoryModel");
        Loader::model("UserModel");
        Loader::model("UserRole");

        Loader::setSnippet("sidebar", "templates/sidebar");

        Loader::model("getProducts", "/controllers/products/");
        Loader::model("getCategories", "/controllers/categories/");

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

        return $product->randomProducts(4);
    }

    private function getRootCategories()
    {
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