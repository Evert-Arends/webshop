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
    }

    public function index()
    {
        $this->userLogin();
    }

    private function userLogin()
    {
        $request = $this->request;
        if (isset($request->post["login"])) {
            if (isset($request->post["email"])) {
                $email = $request->post["email"];
            } else {
                return $this->msg("Please provide an email");
            }

            if (isset($request->post["password"])) {
                $password = $request->post["password"];
            } else {
                return $this->msg("Please provide a password");
            }

            $userToCheckWith = new UserModel();
            $userToCheckWith->getUser($email);

            $check = password_verify($password, (string)$userToCheckWith->getHashedPassword());
            if ($check) {
                Session::set("id", $userToCheckWith->getId());
                return $this->msg("ok");
            } else {
                return $this->msg("Username and Password do not match");
            }
        } else {
            // render view
            return $this->msg("Form not posted.");
        }
    }

    private function msg($error)
    {
        echo $error;
    }
}