<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 29-3-18
 * Time: 13:40
 */

class OrderModel extends EmmaModel
{
    private $id;
    private $user_id;
    private $order_date;
    private $user;
    private $rules;
    private $objectChecker;

    /**
     * return reference
     */
    public function __construct()
    {
        parent::__construct();
        $this->objectChecker = new ObjectChecker();
    }

    /**
     *
     */
    public function init()
    {
        Loader::model("CategoryModel");
        Loader::model("ProductImageModel");
    }

    /**
     * @param $dataObject
     * @return $this
     */
    public function fillModel($dataObject)
    {
        $this->setId($dataObject->id);
        $this->setUserId($dataObject->users_id);
        $this->setOrderDate($dataObject->order_date);

        # Retrieve order rules
        $rules = $this->getOrderRulesFromDB($this->getId());
        $ruleModels = $this->createRuleModels($rules);

        $this->setOrderRules($ruleModels);

        # Retrieve order user
        $user = $this->getUserFromDB($this->getUserId());

        $userModel = $this->createUserModel($user);
        $this->setUser($userModel);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastInsertedId() {
        $sql = "SELECT MAX(id) as max_id FROM orders";
        return $this->fetch($sql)->max_id;
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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $order_date
     */
    public function setOrderDate($order_date)
    {
        $this->order_date = $order_date;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @param $user_id
     * @return array|bool
     */
    private function getUserFromDB($user_id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $result = $this->fetchAll($sql, array($user_id));

        return $result;
    }

    /**
     * @param $dbObject
     * @return array
     */
    private function createUserModel($dbObject)
    {
        $models = array();
        if ($dbObject) {
            foreach ($dbObject as $item) {
                $tempModel = new UserModel();
                $tempModel->getUser($item->email);
                array_push($models, $tempModel);
            }
        }
        return $models;
    }

    /**
     * @return mixed
     */
    public function getOrderRules()
    {
        return $this->rules;
    }

    /**
     * @param array $rules , Models
     */
    public function setOrderRules($rules)
    {
        $this->rules = $rules;
    }

    /**
     * @param $order_id
     * @return array|bool
     */
    private function getOrderRulesFromDB($order_id)
    {
        $sql = "SELECT * FROM order_rules WHERE orders_id = ?";
        $result = $this->fetchAll($sql, array($order_id));

        return $result;
    }

    /**
     * @param $dbObject
     * @return array
     */
    private function createRuleModels($dbObject)
    {
        $models = array();
        if ($dbObject) {
            foreach ($dbObject as $item) {
                $tempModel = new OrderRuleModel();
                $tempModel->fillModel($item);
                array_push($models, $tempModel);
            }
        }
        return $models;
    }

    /**
     * @param null $id
     * @param null $user_id
     * @return $this|null
     */
    public function get($id = null, $user_id = null)
    {
        if (!$id && !$user_id) {
            trigger_error("At least one parameter required with requesting a product from the database.");
            return $this;
        }

        // Retrieve product from database
        $ordersTable = new OrdersTable();
        $order = !$id ? $ordersTable->find("id", $id) : $ordersTable->find("id", $id);

        if (!$order) {
            return null; // Return null instead of model.
        }

        # Set product info
        $this->setId($order->Objects->id);
        $this->setUserId($order->Objects->user_id);
        $this->setOrderDate($order->Objects->order_date);

        # Retrieve order rules
        $rolesIDS = $this->getOrderRulesFromDB($this->getId());
        $rules = $this->createRuleModels($rolesIDS);
        $this->setOrderRules($rules);

        # Retrieve order user
        $userIDS = $this->getUserFromDB($this->getUserId());
        $user = $this->createUserModel($userIDS);
        $this->setUser($user);

        return $this;
    }


    /**
     * Creates instance of model
     */
    public function create() {
        $ordersTable = new OrdersTable();
        $value = array(
            "users_id" => $this->getUserId(),
            "order_date" => $this->getOrderDate()
        );

        $id = $ordersTable->insert($value);

        foreach ($this->getOrderRules() as $orderRule) {
            $orderRule->setId($id);
            $orderRule->create(true);
        }
    }

}