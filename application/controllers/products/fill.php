<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 31-3-18
 * Time: 19:26
 */

class FillModel extends EmmaModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This init fills photo table with images for products.
     */
    public function init()
    {
        Loader::model("ProductModel");
        require_once('./controllers/products/getProducts.php');
        $prm = new getProducts();
        $products = $prm->allProducts(0, 100000);
        $prdri = array();
        foreach ($products as $product) {
            array_push($prdri, $product->getId());
        }
        foreach ($prdri as $prd) {
            $sql = "INSERT INTO `photos`(`photo_id`, `products_id`, `locatie`, `description`) VALUES (NULL, $prd, \"https://i.imgur.com/M1o4gih.png\", NULL);";
            $i = 0;
            $times_to_run = 5;
            while ($i++ < $times_to_run) {
                $this->query($sql);
            }
        }
    }
}