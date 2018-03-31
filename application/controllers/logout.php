<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 19-3-18
 * Time: 18:56
 */


class logout extends EmmaController
{
    protected $ReturnData;

    public function init()
    {
        //Class init
    }

    public function index()
    {
        $this->page();
    }

    public function page()
    {
        Session::nullify("id");
        $this->redirect(BASEPATH . "home");
    }
}