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
        require_once('./controllers/users/editUsers.php');
    }

    public function index()
    {
        $this->adminData();
        $this->editUser();
        $this->page();
    }

    public function allUsers()
    {
        $allUsers = new getUsers();
        $allUsers->init();

        return $allUsers->allUsers();
    }

    private function editUser()
    {
        $request = $this->request;
        if (isset($request->post["editUserBtn"])) {
            if (isset($request->post["userId"])) {
                $userId = $request->post["userId"];
                $roleId = $request->post["selectRole"];

                $editUser = new editUsers();
                $editUser->init();

                $editUser->editUser($userId, $roleId);
            }
        }
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