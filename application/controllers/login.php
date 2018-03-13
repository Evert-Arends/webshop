<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 19-2-18
 * Time: 13:07
 */

class login extends EmmaController
{
    protected $ReturnData;

    public function init()
    {
        Loader::model("UserModel");
        $this->userLogin();
    }

    public function index()
    {
        $this->page();
    }

    private function userLogin()
    {
        $request = $this->request;
        if (isset($request->get["login"])) {
            $username = $request->get["email"];

            $userToCheckWith = new UserModel();
            $userToCheckWith->getUser($username);

            var_dump($userToCheckWith->getHashedPassword());

            $check = password_verify("admin", (string)$userToCheckWith->getHashedPassword());
            if ($check) {
                Session::set("id", $userToCheckWith->getId());
            }
            // redirect
            $this->redirect("home");

        } else {
            // render view
        }
    }

    public function page($page = "login")
    {
        Loader::view("templates/header.php");
        Loader::view("login/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}