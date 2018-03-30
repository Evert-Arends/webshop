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
    protected $AllRootCategories;

    public function init()
    {
        // Load models
        Loader::model("CategoryModel");
        Loader::model("getProducts", "/controllers/products/");
        Loader::model("getCategories", "/controllers/categories/");
        Loader::setSnippet("sidebar", "templates/sidebar");
        // Load specific external helpers
    }

    public function index()
    {
        $this->loadTemplateData();
        $this->page();
    }

    public function getPageNumber()
    {
        if (isset($this->request->get["page"]) || !empty($this->request->get["page"])) {
            $page = $this->request->get["page"];
            if ($page < 1) {
                $page = 1;
            }
        } else {
            $page = 1;
        }
        return $page;
    }

    private function getRootCategories()
    {
        $categories = new getCategories();
        $categories->init();
        return $categories->allRootCategories();
    }

    public function productData()
    {
        $product = new getProducts();
        $product->init();

        $per_page = 16;

        $page = $this->getPageNumber();

        $calc = $per_page * $page;
        $start = $calc - $per_page;

        if (isset($this->request->get["cat"]) && isset($this->request->get["q"])) {
            $category = $this->request->get["cat"];
            $searchFor = $this->request->get["q"];
            $products = $product->allProductsInCategoryOnSearch($category, $searchFor, $start, $per_page);
        } elseif (isset($this->request->get["cat"]) && !isset($this->request->get["q"])) {
            $category = $this->request->get["cat"];
            $products = $product->allProductsInCategory($category, $start, $per_page);
        } elseif (!isset($this->request->get["cat"]) && isset($this->request->get["q"])) {
            $searchFor = $this->request->get["q"];
            $products = $product->allProductsOnSearch($searchFor, $start, $per_page);
        } else {
            $products = $product->allProducts($start, $per_page);
        }

        return $products;
    }

    public function countProducts()
    {
        $product = new getProducts();
        $product->init();

        if (isset($this->request->get["cat"]) && isset($this->request->get["q"])) {
            $category = $this->request->get["cat"];
            $searchFor = $this->request->get["q"];
            $count = $product->countProductsInCategoryOnSearch($category, $searchFor);
        } elseif (isset($this->request->get["cat"]) && !isset($this->request->get["q"])) {
            $category = $this->request->get["cat"];
            $count = $product->countProductsInCategory($category);
        } elseif (!isset($this->request->get["cat"]) && isset($this->request->get["q"])) {
            $searchFor = $this->request->get["q"];
            $count = $product->countProductsOnSearch($searchFor);
        } else {
            $count = $product->countProducts();
        }

        return $count;
    }

    public function checkUrlParameter($parameter)
    {
        if (isset($this->request->get[$parameter])) {
            return "&" . $parameter . "=" . $_GET[$parameter];
        } else {
            return "";
        }
    }

    private function loadTemplateData()
    {
        $this->pageNumber = $this->getPageNumber();
        $this->Products = $this->productData();
        $this->productCount = $this->countProducts();
        $this->AllRootCategories = $this->getRootCategories();
    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("overview/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}