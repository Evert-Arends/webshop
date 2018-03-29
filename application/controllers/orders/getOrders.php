<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 29-3-18
 * Time: 14:55
 */

class getOrders extends EmmaModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        Loader::model("OrderModel");
        Loader::model("OrderRuleModel");
        Loader::model("UserModel");
        Loader::model("ProductModel");
    }


    private function getAllOrders()
    {
        $sql = "SELECT * FROM `orders`";
        $result = $this->fetchAll($sql);
        return $result;
    }

    public function allOrders()
    {
        $allIDS = $this->getAllOrders();

        if (!$allIDS) {
            return NULL;
        }
        return $this->createModels($allIDS);
    }

    private function createModels($IDS)
    {
        $orders = array();
        foreach ($IDS as $value) {
            $orderModel = new OrderModel();
            $orderModel->fillModel($value);

            if (!$orderModel) {
                continue;
            }
            array_push($orders, $orderModel);
        }
        return $orders;
    }
}