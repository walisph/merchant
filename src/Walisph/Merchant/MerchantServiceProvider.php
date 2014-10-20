<?php namespace Walisph\Merchant;

use Illuminate\Support\ServiceProvider;

class MerchantServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{
		$this->package('walisph/merchant', 'walis-merchant');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

	}


	protected function registerDomPDF()
	{
		$this->app->bind('dompdf', function( $app ){

		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

	/**
	 * Define a value, if not already defined
	 *
	 * @param string $name
	 * @param string $value
	 */
	protected function define($name, $value)
	{
		if (!defined($name)) {
			define($name, $value);
		}
	}

}
