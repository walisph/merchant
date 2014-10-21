<?php namespace Walisph\Merchant;

interface ProductInterface {

	public function getProductName();

	public function getDescription();

	public function getPrice();

	public function getManufacturer();

	public function getBrand();

	public function getProductModel();

}
 