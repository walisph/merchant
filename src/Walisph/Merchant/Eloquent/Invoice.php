<?php namespace Walisph\Merchant\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

	protected $table = 'invoices';
	protected $fillable = [ 'product_id', 'quantity', 'customer_email', 'customer_data', 'product_data' ];

	/**
	 * Customer data into serialize
	 * @param $value
	 *
	 * @return string
	 */
	public function setCustomerDataAttribute( $value )
	{
		return $this->attributes['customer_data'] = serialize( $value );
	}

	/**
	 * Setter for Product data attribute into serialize
	 * @param $value
	 *
	 * @return string
	 */
	public function setProductDataAttribute( $value )
	{
		return $this->attributes['product_data'] = serialize( $value );
	}

	/**
	 * Get the customer data by unserialize()
	 * @param $value
	 *
	 * @return mixed
	 */
	public function getCustomerDataAttribute( $value )
	{
		return unserialize( $value );
	}

	/**
	 * Get the product data by unserialize()
	 * @param $value
	 *
	 * @return mixed
	 */
	public function getProductDataAttribute( $value )
	{
		return unserialize( $value );
	}

}