<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 22-3-18
 * Time: 15:07
 */

class admin_users extends EmmaController
{
    protected $users;

    public function init()
    {
        require_once('./controllers/users/getUsers.php');
    }

    public function index()
    {
        $this->adminData();
        $this->page();
    }

    public function allUsers()
    {
        $allUsers = new getUsers();
        $allUsers->init();

        return $allUsers->allUsers();
    }

    private function adminData()
    {
        $this->users = $this->allUsers();
    }

    public function page($page = "index")
    {
        Loader::view("templates/admin_header.php");
        Loader::view("users/" . $page . ".php");
        Loader::view("templates/admin_footer.php");
    }
}