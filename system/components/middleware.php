<?php

/**
 * Created by PhpStorm.
 * User: berm
 * Date: 19-2-18
 * Time: 14:16
 */
class Middleware extends EmmaModel
{
    /**
     * In charge of security and login.
     */

    // request object
    private $request;

    public function __construct()
    {
        parent::__construct();
    }

    public function init($request)
    {
        $this->request = $request;
        $this->setUser();
        $this->setRequestParameters();
    }

    private function setRequestParameters()
    {
        // sanitize and get post/get objects.
        $this->request->post = $this->setPost();
        $this->request->get = $this->setGet();
    }

    /**
     * Generates dynamic user object and their roles.
     * Requires an user table, and a roles table.
     */
    private function setUser()
    {
        $userSession = Session::get("id");
        if (isset($userSession)) {
            $sql = "SELECT * FROM users WHERE id = ?";
            $user = $this->fetch($sql, array($userSession));
            if ($user) {

                $sql = "SELECT * FROM roles WHERE name = ?";
                $role_name = "";

                if (property_exists($user, "roles_name")) {
                    if (!empty($user->roles_name)) {
                        $role_name = $user->roles_name;
                    }
                }
                $role = $this->fetch($sql, array($role_name));
                $this->setUserObject($user);

                if (!empty($role)) {
                    $this->setUserRole($role);
                } else {
                    $this->setUserRole(false);
                    $this->setUserAuth(false);

                    return false;
                }

                $this->setUserAuth(true);

                return true;
            } else {
                $this->setUserAuth(false);
                return false;
            }
        } else {
            $this->setUserAuth(false);
            return false;
        }
    }

    /**
     * @param $status
     */
    private function setUserAuth($status)
    {
        $this->request->User = $status;
        $this->request->User->isAuthenticated = $status;
    }

    private function setUserRole($role)
    {
        $this->request->User->UserRole = $role;

    }

    private function setUserObject($user)
    {
        $this->request->User = $user;
    }

    private function setPost()
    {
        foreach ($_POST as $item => $value) {
            filter_var($_POST[$item], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        return $_POST;
    }

    private function setGet()
    {
        foreach ($_GET as $item => $value) {
            filter_var($_GET[$item], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        return $_GET;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getCleanRequestObject()
    {
        return $this->request;
    }

}