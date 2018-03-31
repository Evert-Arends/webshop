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

    public function editProduct($productId, $name, $description, $manufacturer, $category, $price, $discount, $images, $imgIDS)
    {
        $productTable = new ProductsTable();
        $productTable->find('id', $productId);
        $productTable->Objects->name = $name;
        $productTable->Objects->description = $description;
        $productTable->Objects->manufacturer = $manufacturer;
        $productTable->Objects->categories_id = $category;
        $productTable->Objects->price = $price;

        $allImages = array_combine($imgIDS, $images);

        if($discount){
            $discountTable = new product_has_discount();
            if($discountTable->find('products_id', $productId)){
                $discountTable->Objects->discount = $discount;
                $discountTable->save();
            } else{
                $discountTable->insert(array(
                    "products_id" => $productId,
                    "discount" => $discount
                ));
            }
        }

        $productTable->save();

        if($allImages) {
            $photoTable = new PhotosTable();
            $value = array(
                "photo_id" => "",
                "products_id" => $productId,
                "locatie" => ""
            );
            foreach ($allImages as $id => $location) {
                if($photoTable->find('photo_id', $id)){
                    $photoTable->Objects->locatie = $location;
                    $photoTable->save();
                }else{
                    $value["photo_id"] = $id;
                    $value["locatie"] = $location;
                    $photoTable->insert($value);
                }
            }
        }else{
            echo "IM DONEEEEEEEEEEEEEEEEEE";
        }
    }
}