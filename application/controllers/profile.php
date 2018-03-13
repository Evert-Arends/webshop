<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 13-2-18
 * Time: 19:34
 */

class profile extends EmmaController
{
    protected $ReturnData;

    public function init()
    {
        // init required classes
    }

    public function index()
    {
        $this->page();
    }

    public function productData()
    {
        //required data
    }

    public function page($page = "index")
    {
        $this->ReturnData = $this->productData();
        Loader::view("templates/header.php");
        Loader::view("profile/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}