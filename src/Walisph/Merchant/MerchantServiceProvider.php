<?php namespace Walisph\Merchant;

/**
 * This has not been possible with the help of DOMPDF Wrapper for Laravel
 * https://github.com/barryvdh/laravel-dompdf
 *
 */

use DOMPDF;
use Exception;
use Illuminate\Support\ServiceProvider;
use Walisph\Merchant\Brochure\Brochure;

class MerchantServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{
		$this->package( 'walisph/merchant', 'walis-merchant' );
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerDompdfDefinitions();
		$this->requireDompdfConfig();
		$this->app->bind('walis-merchant.brochure', function( $app )
		{
			return new Brochure( new DOMPDF, $app['config'], $app['files'], $app['view'], $app['path.public'] );
		});
	}

	/**
	 * Register the DOMPDF Define
	 */
	protected function registerDompdfDefinitions()
	{
		$defines = $this->app['config']->get( 'walis-merchant::dompdf.defines' ) ?: array();
		foreach ( $defines as $key => $value )
		{
			$this->define( $key, $value );
		}
		$this->define( "DOMPDF_ENABLE_REMOTE", true );
		$this->define( "DOMPDF_ENABLE_AUTOLOAD", false );
		$this->define( "DOMPDF_CHROOT", $this->app['path.base'] );
		$this->define( "DOMPDF_LOG_OUTPUT_FILE", $this->app['path.storage'] . '/logs/dompdf.html' );
	}

	/**
	 * Register the DOMPDF Configuration
	 */
	protected function requireDompdfConfig()
	{
		$config_file = $this->app['path.base'] . '/vendor/dompdf/dompdf/dompdf_config.inc.php';
		if ( file_exists( $config_file ) )
		{
			require_once $config_file;
		}
		else
		{
			// This means you are working on workbench
			require_once __DIR__ . '/../../../vendor/dompdf/dompdf/dompdf_config.inc.php';
		}
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
	protected function define( $name, $value )
	{
		if ( ! defined( $name ) )
		{
			define( $name, $value );
		}
	}

}
