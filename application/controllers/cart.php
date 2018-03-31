<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 12-2-18
 * Time: 11:48
 */

class cart extends EmmaController
{
    protected $ReturnData;
    protected $RandomProduct;
    protected $cart;

    public function init()
    {
        Loader::model("ProductModel");
        Loader::model("OrderModel");
        Loader::model("OrderRuleModel");
        Loader::model("UserModel");
        Loader::setSnippet("sidebar_product", "templates/sidebar_product");
        Loader::model("getProducts", "/controllers/products/");
    }

    public function index()
    {
        $this->loadTemplateData();

        if (isset($this->request->post["ajax"])) {
            return $this->checkAjaxRequest();
        } else {
            $this->cart = $this->getCartSession();
            foreach ($this->cart as &$item) {
                $productModel = new ProductModel();
                $item["model"] = $productModel->get($item["product"]);
            }
            return $this->page();
        }
    }

    /** Ajax handler for shopping cart */
    private function checkAjaxRequest()
    {
        if ($this->checkPost("add_product")) {
            if (!$this->checkPost("product_id")) {
                return $this->ajax_msg("Please provide a product");
            } else {
                $id = intval($this->request->post["product_id"]);
                $amount = $this->request->post["amount"];
                if (!$amount)
                    return $this->ajax_msg("Please provide an amount");

                if (is_int($id))
                    return $this->addProduct($id, $amount);

                return $this->ajax_msg("Please provide an integer");

            }
        } elseif ($this->checkPost("delete_product")) {
            if (!$this->checkPost("session_key"))
                return $this->ajax_msg("No session key provided.");
            $sessionKey = $this->request->post["session_key"];
            $this->removeProduct($sessionKey);
        } elseif ($this->checkPost("edit_product")) {
            if (!$this->checkPost("session_key"))
                return $this->ajax_msg("No session key provided.");
            if (!$this->checkPost("amount"))
                return $this->ajax_msg("No new amount provided.");
            if (!$this->checkPost("product_id"))
                return $this->ajax_msg("No product id provided.");

            $amount = $this->request->post["amount"];
            $sessionKey = $this->request->post["session_key"];
            $product_id = $this->request->post["product_id"];
            $this->editProduct($sessionKey, $product_id, $amount);
        } elseif ($this->checkPost("payday")) {
            if (!$this->request->User->isAuthenticated) {
                return $this->ajax_msg("U moet geregisteerd en ingelogd zijn om een besttelling te kunnen plaatsen.");
            } else {
                return $this->translateCartToOrder();
            }
        }

        var_dump($this->request->post);

        return false;
    }

    private function translateCartToOrder()
    {
        $cart = Session::get("cart");

        if (empty($cart)) {
            return $this->ajax_msg("Geen producten gevonden");
        }
        $userModel = new UserModel();
        $userModel->getUser($this->request->User->email);

        $orderModel = new OrderModel();
        $orderModel->setUserId($this->request->User->id);
        $orderModel->setUser($userModel);
        $orderModel->setOrderDate(date("Y-m-d H:i:s"));
        $orderModel->setId($orderModel->getLastInsertedId() + 1);

        $orderRules = array();

        foreach ($cart as $item) {
            $productModel = new ProductModel();
            $productModel->get($item["product"]);

            $orderRuleModel = new OrderRuleModel();
            $orderRuleModel->setProductId($productModel->getId());
            $orderRuleModel->setAmount($item["amount"]);
            $orderRuleModel->setOrderId($orderModel->getId());
            array_push($orderRules, $orderRuleModel);
        }
        $orderModel->setOrderRules($orderRules);
        $orderModel->create();

        Session::nullify("cart");

        return $this->ajax_msg("Uw bestelling is geplaatst, u ontvant spoedig meer details. Bedankt!");
    }

    private function checkPost($var)
    {
        return isset($this->request->post[$var]) ? true : false;
    }

    private function addProduct($id, $amount)
    {
        $session = $this->getCartSession();
        $product = array(
            "product" => $id,
            "amount" => $amount,
        );


        $session[$this->generateRandomString(21)] = $product;
        $this->setCartSession($session);

        return $this->ajax_msg("success");
    }

    private function editProduct($session_key, $id, $amount)
    {
        $session = $this->getCartSession();
        $session[$session_key] = array(
            "product" => $id,
            "amount" => $amount
        );

        $this->setCartSession($session);
        return $this->ajax_msg("success");

    }

    private function removeProduct($session_key)
    {
        $session_array = $this->getCartSession();
        unset($session_array[$session_key]);

        $this->setCartSession($session_array);
        return $this->ajax_msg("success");

    }

    private function ajax_msg($msg)
    {
        echo $msg;
    }

    private function setCartSession($session)
    {
        Session::set("cart", $session);
    }

    private function getCartSession()
    {
        $session = Session::get("cart");
        if (!$session) {
            $this->setCartSession(array());
        }

        return Session::get("cart");
    }

    private function randomProduct()
    {
        $product = new getProducts();
        $product->init();

        return $product->randomProducts(1);
    }

    private function loadTemplateData()
    {
        $this->RandomProduct = $this->randomProduct();
    }

    public function page($page = "index")
    {
        Loader::view("templates/header.php");
        Loader::view("cart/" . $page . ".php");
        Loader::view("templates/footer.php");
    }
}