<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 31-3-18
 * Time: 11:13
 */

class editUsers extends EmmaModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        Loader::model("UserModel");
    }

    /**
     * @param $userId
     * @param $roleName
     */
    public function editUser($userId, $roleName)
    {
        $userTable = new UsersTable();
        $userTable->find('id', $userId);
        $userTable->Objects->roles_name = $roleName;
        $userTable->save();
    }
}