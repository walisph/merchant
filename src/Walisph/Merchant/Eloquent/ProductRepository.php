<?php namespace Walisph\Merchant\Eloquent;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Walisph\Merchant\ProductInterface;

class ProductRepository extends Eloquent implements ProductInterface {

    protected $fillable = [ 'name', 'description', 'data', 'images', 'price', 'manufacturer', 'brand', 'model', 'product_id' ];

    public function getDataAttribute( $value )
    {
        if( $value )
        {
            return json_decode( $value );
        }
        return [];
    }

    public function getImagesAttribute( $value )
    {
        return unserialize( $value );
    }

    public function setImagesAttribute( $value )
    {
        return $this->attributes['images'] = serialize( $value );
    }

    public function getProductName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getProductModel()
    {
        return $this->model;
    }
}
 