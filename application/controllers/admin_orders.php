<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 29-3-18
 * Time: 13:41
 */

class admin_orders extends EmmaController
{
    protected $user;

    public function init()
    {
        // init required classes
    }

    public function index()
    {
        $this->adminData();
        $this->page();
    }

    private function getUser(){
        return $this->request->User;
    }

    public function adminData()
    {
        $this->user = $this->getUser();
    }

    public function page($page = "index")
    {
        Loader::view("templates/admin_header.php");
        Loader::view("orders/" . $page . ".php");
        Loader::view("templates/admin_footer.php");
    }
}