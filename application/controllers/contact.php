<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 19-2-18
 * Time: 13:07
 */

class contact extends EmmaController
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
        Loader::view("contact/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}