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

        Loader::model("editProducts", "/controllers/products/");
        Loader::model("getCategories", "/controllers/categories/");
        Loader::model("getProducts", "/controllers/products/");
    }

    public function index()
    {
        $this->adminData();
        $this->editProduct();
        $this->page();
    }

    /**
     * @return null|$productId
     */
    public function getProductId()
    {
        if (isset($this->request->get["id"])) {
            $productId = $this->request->get["id"];
        } else {
            $productId = null;
        }
        return $productId;
    }

    /**
     * @param $productId
     * @return array
     */
    public function getProduct($productId)
    {
        $product = new getProducts();
        $product->init();
        return $product->getProductOnId($productId);
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
     * Edits product with data from post request
     */
    private function editProduct()
    {
        $request = $this->request;
        if (isset($request->post["editProductBtn"])) {
            if (isset($request->post["id"])) {

                $productId = $request->post["id"];
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

                $imgId1 = $request->post["imgId1"];
                $imgId2 = $request->post["imgId2"];
                $imgId3 = $request->post["imgId3"];
                $imgId4 = $request->post["imgId4"];
                $imgId5 = $request->post["imgId5"];

                $imgIDS = array($imgId1, $imgId2, $imgId3, $imgId4, $imgId5);
                $images = array($img1, $img2, $img3, $img4, $img5);

                $editProduct = new editProducts();
                $editProduct->init();

                $editProduct->editProduct($productId, $name, $description, $manufacturer, $category, $price, $discount, $images, $imgIDS);

                header("Location: " . BASEPATH . "products/");
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