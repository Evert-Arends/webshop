<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 30-3-18
 * Time: 17:33
 */


class editProducts extends EmmaModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        Loader::model("ProductModel");
    }

    public function editProduct($productId, $name, $description, $manufacturer, $category, $price, $discount)
    {
        $productTable = new ProductsTable();
        $productTable->find('id', $productId);
        $productTable->Objects->name = $name;
        $productTable->Objects->description = $description;
        $productTable->Objects->manufacturer = $manufacturer;
        $productTable->Objects->categories_id = $category;
        $productTable->Objects->price = $price;

        if($discount){
            $discountTable = new product_has_discount();
            if($discountTable->find('products_id', $productId)){
                $discountTable->Objects->discount = $discount;
            } else{
                $discountTable->insert(array(
                    "products_id" => $productId,
                    "discount" => $discount
                ));
            }
        }
        $productTable->save();
    }
}