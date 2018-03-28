<?php
/**
 * Created by PhpStorm.
 * User: ardjan
 * Date: 28-3-18
 * Time: 15:45
 */

class ProductImageModel extends EmmaModel
{
    private $photoId;
    private $productId;
    private $location;
    private $description;

    /**
     * return reference
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $photo_id
     * @return bool|ProductImageModel
     */
    public function autoFillModel($photo_id)
    {
        $photoTable = new PhotosTable();
        $images = $photoTable->find("photo_id", $photo_id);

        if (!$images) {
            return false;
        }

        $this->setProductId($images->Objects->products_id);
        $this->setPhotoId($images->Objects->photo_id);
        $this->setLocation($images->Objects->locatie);
        $this->setDescription($images->Objects->description);

        return $this;
    }

    /**
     * @param $dataArray
     * @return bool|ProductImageModel
     */
    public function fillModel($dataArray) {
        if(!$dataArray) {
            return false;
        }
        $this->setProductId($dataArray->products_id);
        $this->setPhotoId($dataArray->photo_id);
        $this->setLocation($dataArray->locatie);
        $this->setDescription($dataArray->description);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhotoId()
    {
        return $this->photoId;
    }

    /**
     * @param $photoId
     */
    public function setPhotoId($photoId)
    {
        $this->photoId = $photoId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param $commit
     * @return int
     */
    public function create($commit)
    {
        $photoTable = new PhotosTable();

        $values = array(
            "photo_id" => $this->getPhotoId(),
            "products_id" => $this->getProductId(),
            "locatie" => $this->getLocation(),
            "description" => $this->getDescription(),
        );
        if ($commit) {
            $id = $photoTable->insert(
                $values
            );

            $this->setPhotoId($id);

            return $id;
        }
    }

}