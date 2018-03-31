<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 22-3-18
 * Time: 15:07
 */

class admin extends EmmaController
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

    /**
     * @return mixed
     */
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
        Loader::view("admin/" . $page . ".php");
        Loader::view("templates/admin_footer.php");
    }
}