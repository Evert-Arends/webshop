<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 28-3-18
 * Time: 15:45
 */

class OrderRuleModel extends EmmaModel
{
    private $id;
    private $order_id;
    private $product_id;
    private $amount;
    private $product;

    /**
     * return reference
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $rule_id
     * @return bool|OrderRuleModel
     */
    public function autoFillModel($rule_id)
    {
        $rulesTable = new OrderRulesTable();
        $rules = $rulesTable->find("id", $rule_id);

        if (!$rules) {
            return false;
        }

        $this->setId($rules->Objects->id);
        $this->setOrderId($rules->Objects->order_id);
        $this->setProductId($rules->Objects->product_id);
        $this->setAmount($rules->Objects->amount);

        # Retrieve product
        $product = $this->getProductFromDB($this->getProductId());
        $productModel = $this->createProductModel($product);
        $this->setProduct($productModel);

        return $this;
    }

    /**
     * @param $dataArray
     * @return bool|OrderRuleModel
     */
    public function fillModel($dataArray)
    {
        if (!$dataArray) {
            return false;
        }
        $this->setId($dataArray->id);
        $this->setOrderId($dataArray->order_id);
        $this->setProductId($dataArray->product_id);
        $this->setAmount($dataArray->amount);

        # Retrieve product
        $product = $this->getProductFromDB($this->getProductId());
        $productModel = $this->createProductModel($product);
        $this->setProduct($productModel);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @param $product_id
     * @return array|bool
     */
    private function getProductFromDB($product_id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $result = $this->fetchAll($sql, array($product_id));

        return $result;
    }

    /**
     * @param $dbObject
     * @return array
     */
    private function createProductModel($dbObject)
    {
        $models = array();
        if ($dbObject) {
            foreach ($dbObject as $item) {
                $tempModel = new ProductModel();
                $tempModel->fillModel($item);
                array_push($models, $tempModel);
            }
        }
        return $models;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }


    /**
     * @param $commit
     * @return int
     */
    public function create($commit)
    {
        $orderRuleTable = new OrderRulesTable();

        $values = array(
            "id" => $this->getId(),
            "order_id" => $this->getOrderId(),
            "product_id" => $this->getProductId(),
            "amount" => $this->getAmount(),
        );
        if ($commit) {
            $id = $orderRuleTable->insert(
                $values
            );

            $this->setId($id);

            return $id;
        }
    }

}