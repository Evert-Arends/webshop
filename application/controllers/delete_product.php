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
        Loader::model("deleteProducts", "/controllers/products/");
    }

    public function index()
    {
        $this->deleteProduct();
    }

    /**
     * Deletes product on ID
     */
    private function deleteProduct()
    {
        $request = $this->request;
        if (isset($request->post["deleteProductBtn"])) {
            if (isset($request->post["productId"])) {
                $productId = $request->post["productId"];

                $deleteProduct = new deleteProducts();
                $deleteProduct->init();

                $deleteProduct->deleteProductOnId($productId);

                header("Location: ". BASEPATH ."products/");
            }
        }
    }
}