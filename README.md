# WalisPH Merchant library
#### Walis Apps for ecommerce preference
* * *

## Information
 - This package have the basic product schema based on the [Product Markup](http://schema.org/Product) 
 - Includes the DOMPDF Laravel wrapper by barryvdh. [Github](https://github.com/barryvdh/laravel-dompdf)
 - Includes the Walis Map package. [Github](https://github.com/walisph/map)
 - Includes a invoicing capability.
 - Because this package is under development all of the changelog with be viewed [here](CHANGELOG.md)
 - SO FAR, this package only works on Laravel 4

## Installation
Include to your composer.json file
```
"require": {
    ...
    "walisph/merchant": "dev-master"
}
```

#### Configuration
Add to your Application providers, usually at `app/config/app.php`
```
'providers' => [
    ...
    'Walisph\Merchant\MerchantServiceProvider',
]
```

If you want to have the default configuration unless you have to change the package configuration, publish the package configuration by running artisan to your root app.
```
php artisan config:publish walisph/merchant
```

## Migration
Publish migration so you can edit the migration file
```
php artisan migrate:publish walisph/merchant
```

or run by running
```
php artisan migrate --package="walisph/merchant"
```

## Views
You can also edit your invoice template by running
```
php artisan view:publis walisph/merchant
```


* * *
###### CREATED AND DEVELOPED BY WALIS PHILIPPINES