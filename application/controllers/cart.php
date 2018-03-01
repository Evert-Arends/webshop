<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 12-2-18
 * Time: 11:48
 */

class cart extends EmmaController
{
    protected $ReturnData;

    public function index()
    {
        $this->page();

    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("cart/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}