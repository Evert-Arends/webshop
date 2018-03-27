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
        Loader::model("UserModel");
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
            } else {
                return $this->msg(json_encode("Gelukt!"));
            }

            $newUser = new UserModel();
            $newUser->getUser($email);

            $check = password_verify($password, (string)$newUser->getHashedPassword());
            if ($check) {
                Session::set("id", $newUser->getId());
                return $this->msg("ok");
            } else {
                return $this->msg("Username and Password do not match");
            }
        } else {
            // render view
            return $this->msg("Form not posted.");
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
            "inputPostalCode",
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