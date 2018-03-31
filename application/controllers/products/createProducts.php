<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 31-3-18
 * Time: 16:33
 */

class createProducts extends EmmaModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        Loader::model("ProductModel");
    }

    public function createProduct($name, $description, $manufacturer, $category, $price, $discount, $images)
    {
        $productTable = new ProductsTable();
        $id =  $productTable->insert(array(
            "name" => $name,
            "description" => $description,
            "manufacturer" => $manufacturer,
            "categories_id" => $category,
            "price" => $price,
        ));

        if($discount){
            $discountTable = new product_has_discount();
            if($id){
                $discountTable->insert(array(
                    "products_id" => $id,
                    "discount" => $discount
                ));
            }
        }

        if($images) {
            $photoTable = new PhotosTable();
            $value = array(
                "locatie" => "",
                "products_id" => $id,
            );
            foreach ($images as $img) {
                $value["locatie"] = $img;
                $photoTable->insert($value);
            }
        }
    }
}