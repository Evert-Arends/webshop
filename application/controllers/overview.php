<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 10-2-18
 * Time: 14:52
 */

class overview extends EmmaController
{
    protected $Products;
    protected $productCount;
    protected $pageNumber;
    private $request;

    public function init($request)
    {
        $this->request = $request;
        // current directory
        require_once('./controllers/products/getProducts.php');
    }

    public function index()
    {
        $this->loadTemplateData();
        $this->page();
    }

    public function getPageNumber() {
        if (isset($this->request)) {
            $page = $this->request->page;
        } else {
            $page = 1;
        }
        return $page;
    }

    public function productData()
    {
        $product = new getProducts();
        $product->init();

        $per_page = 16;

        $page = $this->getPageNumber();

        $calc = $per_page * $page;
        $start = $calc - $per_page;

        return $product->allProducts($start, $per_page);
    }

    public function countProducts()
    {
        $product = new getProducts();
        $product->init();

        return $product->countProducts();
    }

    private function loadTemplateData()
    {
        $this->pageNumber = $this->getPageNumber();
        $this->Products = $this->productData();
        $this->productCount = $this->countProducts();
    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("overview/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}