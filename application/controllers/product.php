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
    protected $randomProduct;

    public function init()
    {
        Loader::model("ProductModel");

        Loader::setSnippet("sidebar_product", "templates/sidebar_product");

        Loader::model("getProducts", "/controllers/products/");
    }

    public function index()
    {
        $this->loadTemplateData();
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
     * @return array|null
     */
    private function randomProduct()
    {
        $product = new getProducts();
        $product->init();

        return $product->randomProducts(1);
    }

    private function loadTemplateData()
    {
        if ($this->getProductId()) {
            $this->product = $this->getProduct($this->getProductId());
        } else {
            $this->product = null;
        }
        $this->RandomProduct = $this->randomProduct();
    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("product/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}