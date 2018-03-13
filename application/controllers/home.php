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
    private $request;

    public function init($request)
    {
        // Set route request
        $this->request = $request;

        // Load models
        Loader::model("ProductModel");
        Loader::model("CategoryModel");
        Loader::model("UserModel");
        Loader::model("UserRole");

        // Load specific external controllers
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

//    public function testMethod()
//    {
//        $this->UserModel->setRole();
//
//        $products = new ProductsTable();
//        // Create new models.
//        $categoryModel = clone($this->CategoryModel);
//        $categoryModel2 = clone ($this->CategoryModel);
//
//        $categoryModel->setId(1);
//        $categoryModel2->setId(2);
//
//        $categoryModel2->setParent($products);
//
//        $product = $products->find("price", 0);
//        print_r($product);
//        $product->Objects->price = 1200;
//        $product->save();
//        print_r($this->ProductModel->getId());
//
//        $newCategoryObject = clone($this->CategoryModel);
//        $newCategoryObject->setRecursiveLinking(true, true);
//        $newCategoryObject->get(6);
//
//        print_r($newCategoryObject);
//
//        $array = json_decode(json_encode($newCategoryObject), true);
//        print_r($array);
//    }
}