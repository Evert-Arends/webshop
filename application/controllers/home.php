<?php
/**
 * Created by PhpStorm.
 * User: Evert Arends
 * Date: 5-2-18
 * Time: 14:02
 */

class home extends EmmaController
{
    protected $ReturnData;

    public function index()
    {
        $this->page();

    }

    public function page($page = "test")
    {
        $this->getText();
        Loader::view("templates/header.php");
        Loader::view("index/" . $page . ".php");
        Loader::view("templates/footer.php");

    }

    private function getText()
    {
        $this->ReturnData = "Ok dit is leuke tekst.";
    }

    public function testMethod()
    {
        $this->ReturnData = "ok lol";
        $this->page();
    }
}