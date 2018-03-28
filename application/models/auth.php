<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 7-3-18
 * Time: 19:42
 */

class AuthModel extends EmmaModel
{
    private $userId;
    private $hashedPassword;
    private $lastLogin;
    private $ipAddress;

    /**
     * return reference
     */
    public function __construct()
    {
        parent::__construct();
        return $ref =& $this;
    }

    public function fillModel($user_id)
    {
        $authTable = new AuthTable();
        $auth = $authTable->find("users_id", $user_id);

        if (!$auth) {
            return false;
        }

        $this->setUserId($user_id);
        $this->setHashedPassword($auth->Objects->hashed_password);
        $this->setIpAddress($auth->Objects->ip_address);
        $this->setLastLogin($auth->Objects->last_login);

        return $ref =& $this;

    }

    /**
     * @return mixed
     */
    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }

    /**
     * @param mixed $hashedPassword
     */
    public function setHashedPassword($hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
    }

    /**
     * @return mixed
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param mixed $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param mixed $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function create($commit)
    {
        $authTable = new AuthTable();

        $values = array(
            "hashed_password" => $this->getHashedPassword(),
            "password_hash" => "lol",
            "last_login" => $this->getLastLogin(),
            "users_id" => $this->getUserId(),
            "ip_address" => "127.0.0.1",
        );
        if ($commit) {
            $id = $authTable->insert(
                $values
            );

            $this->setUserId($id);

            return $id;
        }

    }

}