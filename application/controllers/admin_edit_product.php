<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 27-3-18
 * Time: 21:48
 */

class admin_edit_product extends EmmaController
{
    protected $product;
    protected $allCategories;

    public function init()
    {
        Loader::model("CategoryModel");

        require_once('./controllers/categories/getCategories.php');
        require_once('./controllers/products/getProducts.php');
    }

    public function index()
    {
        $this->adminData();
        $this->page();
    }

    public function getProductId()
    {
        if (isset($this->request->get["id"])) {
            $productId = $this->request->get["id"];
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

    private function getAllCategories(){
        $categories = new getCategories();
        $categories->init();
        return $categories->allCategories();
    }


    private function adminData()
    {
        $this->allCategories = $this->getAllCategories();

        if ($this->getProductId()) {
            $this->product = $this->getProduct($this->getProductId());
        } else {
            $this->product = null;
        }
    }

    public function page($page = "index")
    {
        Loader::view("templates/admin_header.php");
        Loader::view("edit_product/" . $page . ".php");
        Loader::view("templates/admin_footer.php");
    }
}