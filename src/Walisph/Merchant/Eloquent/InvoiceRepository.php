<?php namespace Walisph\Merchant\Eloquent;

use Illuminate\Database\Eloquent\Model as Eloquent;

class InvoiceRepository extends Eloquent {

	protected $table = 'invoices';

	protected $fillable = [ 'product_id', 'quantity', 'customer_email', 'customer_data', 'product_data' ];

	public function setCustomerDataAttribute( $value )
	{
		return $this->attributes['customer_data'] = serialize( $value );
	}

	public function setProductDataAttribute( $value )
	{
		return $this->attributes['product_data'] = serialize( $value );
	}

	public function getCustomerDataAttribute( $value )
	{
		return unserialize( $value );
	}

	public function getProductDataAttribute( $value )
	{
		return unserialize( $value );
	}
}