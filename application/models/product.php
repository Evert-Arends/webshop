<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 5-2-18
 * Time: 20:52
 */

class ProductModel extends EmmaModel
{
    /**
     * @param $id
     * @return mixed
     */
    public function getProduct($id)
    {
        $sql = "SELECT * "
            . "FROM producten "
            . "WHERE id = 1 "
            . "LIMIT 1;";

        $result = $this->fetch($sql, array($id));

        if (!empty($result->id)) {
            return $result;
        } else {
            return 0;
        }
    }
}