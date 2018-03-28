<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 28-3-18
 * Time: 12:17
 */

class delete_product extends EmmaController
{
    public function init()
    {
        require_once('./controllers/products/deleteProducts.php');
    }

    public function index()
    {
        $this->deleteProduct();
    }

    private function deleteProduct()
    {
        $request = $this->request;
        if (isset($request->post["deleteProductBtn"])) {
            if (isset($request->post["productId"])) {
                $productId = $request->post["productId"];

                $deleteProduct = new deleteProducts();
                $deleteProduct->init();
                $deleteProduct->deleteProductOnId($productId);

            } else {
                return $this->msg("No product found");
            }

        } else {
            return $this->msg("Form not posted.");
        }
        return $this->msg("Product deleted.");
    }

    private function msg($error)
    {
        echo $error;
    }
}