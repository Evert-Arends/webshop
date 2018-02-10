<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 10-2-18
 * Time: 14:52
 */

class overview extends EmmaController
{
    protected $ReturnData;

    public function index()
    {
        $this->page();

    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("overview/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}