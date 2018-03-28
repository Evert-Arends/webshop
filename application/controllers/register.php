<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 27-3-18
 * Time: 22:30
 */

class register extends EmmaController
{
    protected $ReturnData;

    public function init()
    {
        Loader::model("UserModel");
        Loader::model("UserRole");
        Loader::model("AuthModel");
        Loader::model("AddressModel");
    }

    public function index()
    {
        $this->userRegister();
    }

    private function userRegister()
    {
        $request = $this->request;
        if (isset($request->post["register"])) {
            $form = $this->getForm();
            $validate = $this->validateForm($form);

            if (!empty($validate)) {
                return $this->msg(json_encode($validate));
            }

            $newUser = new UserModel();
            $userRole = new UserRole();
            $userAuth = new AuthModel();
            $addressModel = new AddressModel();

            $check = $newUser->checkIfUserExists($form["email"]);


            if ($check) {
                return $this->msg(json_encode(array("Er is al een gebruiker met dit E-mail adres.")));
            }

            $role = $userRole->getRole("Customer");
            $newUser->setRole($role);
            $newUser->setFirstName($form["inputFirstName"]);
            $newUser->setLastName($form["inputLastName"]);
            $newUser->setEmail($form["email"]);
            $newUser->setPhoneNumber($form["inputPhone"]);
            $newUser->setDateRegistered(date('Y-m-d H:i:s'));
            $newUser->setDateOfBirth(date('Y-m-d H:i:s'));


            $userId = $newUser->create(true);
            if (!$userId) {
                return $this->msg(json_encode(array("Er ging iets fout met het opslaan van de gegevens1.")));

            }

            $addressModel->setUserId($userId);
            $addressModel->setPostcode($form["inputPostalCode"]);
            $addressModel->setStreet($form["inputStreet"]);
            $addressModel->setAddition($form["inputHouseAddition"]);
            $addressModel->setHouseNumber($form["inputHouseNumber"]);

            $addressModel->create(true);

            $userAuth->setLastLogin(date('Y-m-d H:i:s'));
            $userAuth->setIpAddress("127.0.0.1");
            $userAuth->setHashedPassword(password_hash($form["password"], PASSWORD_DEFAULT));
            $userAuth->setUserId($userId);
            $newUser->setAuth($userAuth);

            $authId = $userAuth->create(true);


            if ($authId == 0) {
                return $this->msg("ok");
            } else {
                return $this->msg(json_encode(array("Er ging iets fout met het opslaan van de gegevens.")));
            }
        } else {
            // render view
            return $this->msg(json_encode(array("Form not posted.")));
        }
    }

    private function getForm()
    {
        $keys = array
        (
            "email",
            "password",
            "inputFirstName",
            "inputStreet",
            "inputHouseNumber",
            "inputPostalCode",
            "inputHouseAddition",
            "inputCityName",
            "inputPhone",
            "inputLastName"
        );

        $form_array = array();

        foreach ($keys as $key) {
            array_push($form_array, $form_array[$key] = $this->getPost($key));
        }
        return $form_array;
    }

    private function getPost($target)
    {
        return isset($this->request->post[$target]) ? $this->request->post[$target] : "";
    }

    private function msg($error)
    {
        echo $error;
    }

    /**
     * @param $form
     * @return array
     */
    private function validateForm($form)
    {
        $error_array = array();
        $missing_values = array();

        foreach ($form as $key => $value) {
            if (empty($value)) {
                array_push($missing_values, $key);
            }
        }

        foreach ($missing_values as $missing_value) {
            switch ($missing_value) {
                case "":
                    continue;
                case "email":
                    array_push($error_array, "Vul een email in.");
                    break;
                case "password":
                    array_push($error_array, "Vul een wachtwoord in.");
                    break;
                case "inputFirstName":
                    array_push($error_array, "Vul een voornaam in.");
                    break;
                case "inputStreet":
                    array_push($error_array, "Vul een straatnaam in.");
                    break;
                case "inputHouseNumber":
                    array_push($error_array, "Vul een huisnummer in.");
                    break;
                case "inputPostalCode":
                    array_push($error_array, "Vul een postcode in.");
                    break;
                case "inputCityName":
                    array_push($error_array, "Vul een plaatsnaam in.");
                    break;
                case "inputPhone":
                    array_push($error_array, "Vul een telefoonnummer in.");
                    break;
                case "inputLastName":
                    array_push($error_array, "Vul een achternaam in.");
                    break;
            }
        }
        return $error_array;

    }
}