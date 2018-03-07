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
        EmmaModel::__construct();
    }

    public function setMiddleWare($request)
    {
        $this->request = $request;
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
    private function retrieveUser()
    {

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

    public function getCleanRequestObject() {
        return $this->request;
    }

}