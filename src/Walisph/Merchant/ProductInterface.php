<?php namespace Walisph\Merchant;

interface ProductInterface {

    public function getDataAttribute( $value );
    public function getImagesAttribute( $value );
    public function getProductName();
    public function getDescription();
    public function getPrice();
    public function getManufacturer();
    public function getBrand();
    public function getProductModel();

}
 