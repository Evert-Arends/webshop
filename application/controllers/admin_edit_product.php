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
    protected $msg;

    public function init()
    {
        Loader::model("CategoryModel");

        require_once('./controllers/products/editProducts.php');
        require_once('./controllers/categories/getCategories.php');
        require_once('./controllers/products/getProducts.php');
    }

    public function index()
    {
        $this->adminData();
        $this->editProduct();
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

    private function editProduct()
    {
        $request = $this->request;
        var_dump($request->post);
        if (isset($request->post["editProductBtn"])) {
            if (isset($request->post["id"])) {

                $productId = $request->post["id"];
                $name = $request->post["name"];
                $description = $request->post["description"];
                $manufacturer = $request->post["manufacturer"];
                $category = $request->post["category"];
                $price = $request->post["price"];
                $discount = $request->post["sale"];

                $editProduct = new editProducts();
                $editProduct->init();

                $editProduct->editProduct($productId, $name, $description, $manufacturer, $category, $price, $discount);

                header("Location: ". BASEPATH ."products/");
            }
        }
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