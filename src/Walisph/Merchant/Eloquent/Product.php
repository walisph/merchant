<?php namespace Walisph\Merchant\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Walisph\Merchant\ProductInterface;

class Product extends Model implements ProductInterface {

	protected $table = 'products';

	protected $fillable = [ 'name', 'description', 'data', 'images', 'price', 'manufacturer', 'brand', 'model', 'type' ];

	/**
	 * Get the data column using Laravel Accessor
	 * @param $value
	 *
	 * @return array|mixed
	 */
	public function getDataAttribute( $value )
	{
		if( $value )
		{
			return json_decode( $value );
		}
		return ['quantity' => 1];
	}

	/**
	 * Setting the image attribute to serialize
	 * using Laravel Mutator
	 *
	 * @param $value
	 *
	 * @return string
	 */
	public function setImagesAttribute( $value )
	{
		return $this->attributes['images'] = serialize( $value );
	}

	/**
	 * Get the image attribute using Laravel Mutator
	 *
	 * @param $value
	 *
	 * @return mixed
	 */
	public function getImagesAttribute( $value )
	{
		return unserialize( $value );
	}

	/**
	 * Get the product name
	 *
	 * @return mixed
	 */
	public function getProductName()
	{
		return $this->name;
	}

	/**
	 * Get product description
	 *
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get product price
	 *
	 * @return mixed
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Get the product manufacturer
	 *
	 * @return mixed
	 */
	public function getManufacturer()
	{
		return $this->manufacturer;
	}

	/**
	 * Get the product brand
	 *
	 * @return mixed
	 */
	public function getBrand()
	{
		return $this->brand;
	}

	/**
	 * Get the product model
	 *
	 * @return mixed
	 */
	public function getProductModel()
	{
		return $this->model;
	}

	/**
	 * Get the value of the dynamic data column
	 *
	 * @param $name
	 * @param $val
	 * @param bool $latest
	 *
	 * @return array
	 */
	public function getData( $name, $val, $latest = true )
	{
		$data = ( $latest ) ? $this->latest()->get() : $this->all();
		$response = [];
		foreach( $data as $key => $value )
		{
			if( $value['data']->{$name} == $val )
			{
				$response[] = $value;
			}
		}
		return $response;
	}

	/**
	 * Get the product type of goods
	 *
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}
}
 