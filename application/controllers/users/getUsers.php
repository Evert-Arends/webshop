<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 23-3-18
 * Time: 13:55
 * @property  UserModel UserModel
 */


class getUsers extends EmmaModel
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
     * @return bool|DataObject
     */
    public function countUsers()
    {
        $sql = "SELECT COUNT(*) AS Total FROM `users`";
        $result = $this->fetch($sql);

        return $result;
    }

    /**
     * @return array|bool
     */
    private function getAllUsers()
    {
        $sql = "SELECT * FROM `users`";
        $result = $this->fetchAll($sql);

        return $result;
    }

    /**
     * @return array|string
     */
    public function allUsers()
    {
        $allIDS = $this->getAllUsers();

        if (!$allIDS) {
            return "No users found";
        }
        return $this->createModels($allIDS);
    }

    /**
     * @param $userId
     * @return array
     */
    public function getUserOnId($userId)
    {
        $sql = "SELECT * FROM `users` WHERE id = ?";
        $result = $this->fetchAll($sql, array((int)$userId));

        return $this->createModels($result);
    }

    /**
     * @param $IDS
     * @return array
     */
    private function createModels($IDS)
    {
        $users = array();
        foreach ($IDS as $value) {
            $userModel = new UserModel();
            $userModel->getUser($value->email);

            if (!$userModel) {
                continue;
            }
            array_push($users, $userModel);
        }
        return $users;
    }

}