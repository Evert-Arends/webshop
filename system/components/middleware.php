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
    private $routes = ROUTES;

    public function __construct()
    {
        parent::__construct();
    }

    public function init($request)
    {
        $this->request = $request;

        if (AUTH) {
            $this->setUser();
        }
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
     * Requires an active database connections
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
        if (!$status) {
            $this->request->User = new stdClass();
        }
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

    public function checkPrivileges($route)
    {
        if (!isset($this->routes[$route])) {
            return false;
        } else {
            $routeArray = $this->routes[$route];

            if (property_exists($this->request, "User")) {
                if(!property_exists($this->request->User, "UserRole")) {
                    $this->request->User->UserRole = new stdClass();
                }
                if (!property_exists($this->request->User->UserRole, "level")) {
                    $this->request->User->UserRole->level = 0;
                }

                $level = $this->request->User->UserRole->level;
                if ($routeArray["protected"]) {
                    if (!$this->request->User->isAuthenticated) {
                        return false;
                    }

                    // If the user is logged in, and the level is 0 (accessible to all when logged in).
                    if (in_array(0, $routeArray["level"])) {
                        if ($this->request->User->isAuthenticated) {
                            return true;
                        }
                    }

                    if (in_array($level, $routeArray["level"])) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return true;
                }

            } else {
                return false;
            }
        }

    }
}