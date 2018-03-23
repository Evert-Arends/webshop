<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 22-3-18
 * Time: 15:07
 */

class admin_categories extends EmmaController
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

    public function adminData()
    {
        //required data
    }

    public function page($page = "index")
    {
        $this->ReturnData = $this->adminData();
        Loader::view("templates/admin_header.php");
        Loader::view("categories/" . $page . ".php");
        Loader::view("templates/admin_footer.php");
    }
}