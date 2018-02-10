<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 10-2-18
 * Time: 16:11
 * @property ObjectChecker objectChecker
 */

class UserModel extends EmmaModel
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $role;
    private $hashedPassword;

    /**
     * return reference
     */
    public function __construct()
    {
        $this->objectChecker = new ObjectChecker();
        return $ref =& $this;
    }

    public function getUser($id = "", $email = "")
    {
        if (!$id && $email) {
            trigger_error("At least one of the parameters required.");

        }
    }

    private function getUserFromDB() {

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $check = $this->objectChecker->typeMatcher(New UserRole(), $role);
        if (!$check) {
            trigger_error("Role must be a/an " . get_class(new UserRole()) . " object.");
        } else {
            $this->role = $role;
        }
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
}
