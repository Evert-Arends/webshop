<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 31-3-18
 * Time: 16:32
 */

class admin_create_products extends EmmaController
{
    protected $product;
    protected $allCategories;
    protected $msg;

    public function init()
    {
        Loader::model("CategoryModel");

        Loader::model("createProducts", "/controllers/products/");
        Loader::model("getCategories", "/controllers/categories/");
    }

    public function index()
    {
        $this->adminData();
        $this->createProduct();
        $this->page();
    }

    /**
     * @return array|string
     */
    private function getAllCategories()
    {
        $categories = new getCategories();
        $categories->init();
        return $categories->allCategories();
    }

    /**
     * Creates product with data in post request.
     */
    private function createProduct()
    {
        $request = $this->request;
        if (isset($request->post["createProductBtn"])) {
            if (isset($request->post)) {
                $name = $request->post["name"];
                $description = $request->post["description"];
                $manufacturer = $request->post["manufacturer"];
                $category = $request->post["category"];
                $price = $request->post["price"];
                $discount = $request->post["sale"];
                $img1 = $request->post["image1"];
                $img2 = $request->post["image2"];
                $img3 = $request->post["image3"];
                $img4 = $request->post["image4"];
                $img5 = $request->post["image5"];

                $images = array($img1, $img2, $img3, $img4, $img5);

                $createProduct = new createProducts();
                $createProduct->init();

                $createProduct->createProduct($name, $description, $manufacturer, $category, $price, $discount, $images);

                header("Location: " . BASEPATH . "products/");
            }
        }
    }

    private function adminData()
    {
        $this->allCategories = $this->getAllCategories();
    }

    public function page($page = "index")
    {
        Loader::view("templates/admin_header.php");
        Loader::view("create_product/" . $page . ".php");
        Loader::view("templates/admin_footer.php");
    }
}