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
    // Attributes
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $role;
    private $hashedPassword;
    private $objectChecker;
    private $dateOfBirth;
    private $dateRegistered;
    private $userRole;
    private $phoneNumber;
    private $auth;

    // Models
    private $AuthModel;
    private $UserRole;


    /**
     * return reference to this object
     */
    public function __construct()
    {
        parent::__construct();
        $this->objectChecker = new ObjectChecker();
        $this->UserRole = Loader::model("UserRole");
        Loader::model("AuthModel");
        $this->AuthModel = new AuthModel();
    }

    public function getUser($email = "")
    {
        if (!$email) {
            trigger_error("At least one of the parameters required.");
        }
        $user = $this->getUserFromDB($email);
        if (!$user) {
            return false;
        }

        $this->setId($user->Objects->id);
        $this->setEmail($user->Objects->email);
        $this->setLastName($user->Objects->last_name);
        $this->setFirstName($user->Objects->first_name);
        $this->setDateOfBirth($user->Objects->date_of_birth);
        $this->setDateRegistered($user->Objects->date_registered);
        // Might need to assign a field (UserRole).
        $role = $this->UserRole->getRole($user->Objects->roles_name);
        $this->setRole($role);

        // Set auth model
        $this->auth = $this->AuthModel->fillModel($this->getId());
        if (!$this->auth) {
            return false;
        }

        $this->setHashedPassword($this->auth->getHashedPassword());

        // Return reference to model.
        return $this;

    }

    private function getUserFromDB($email)
    {
        $user_getter = new UsersTable();
        $user = $user_getter->find("email", $email);

        return $user;
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
     * @param mixed $password
     */
    public function setHashedPassword($password)
    {
        $this->hashedPassword = $password;
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

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param mixed $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return mixed
     */
    public function getDateRegistered()
    {
        return $this->dateRegistered;
    }

    /**
     * @param mixed $dateRegistered
     */
    public function setDateRegistered($dateRegistered)
    {
        $this->dateRegistered = $dateRegistered;
    }

    /**
     * @return mixed
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * @param mixed $userRole
     */
    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;
    }

    /**
     * @return mixed
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param mixed $auth
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param $commit
     * This is NOT an update, only an insert!
     * @return int
     */
    public function create($commit)
    {
        $newUser = new UsersTable();
        $values = array(
            "email" => $this->getEmail(),
            "first_name" => $this->getFirstName(),
            "last_name" => $this->getLastName(),
            "roles_name" => $this->getRole()->getName(),
            "date_of_birth" => date('Y-m-d H:i:s'),
            "date_registered" => date('Y-m-d H:i:s'),
            "phone_number" => $this->getPhoneNumber(),
        );

        if ($commit) {
            $id = $newUser->insert(
                $values
            );

            $this->setId($id);

            return $id;
        }
    }


    public function checkIfUserExists($email)
    {
        $tempUser = new UsersTable();
        if($tempUser->find("email", $email)) {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
}
