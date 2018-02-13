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

    public function index()
    {
        $this->page();

    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("profile/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}