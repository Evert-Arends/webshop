<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 12-2-18
 * Time: 11:48
 */

class FourOhFour extends EmmaController
{
    protected $ReturnData;

    public function index()
    {
        var_dump($this->request->User);
        $this->page();

    }

    public function page()
    {
        Loader::view("templates/header.php");
        Loader::view("fourohfour.php");
        Loader::view("templates/footer.php");
    }
}