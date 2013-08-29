<?php namespace Pixelgremlins\Gremlindash;

use Illuminate\Support\ServiceProvider;


class GremlindashServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('pixelgremlins/gremlindash');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$this->app['gremlindash'] = $this->app->share(function($app){
				return new Gremlindash;
		});
		$this->app->booting(function(){
  			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Gremlindash', 'Pixelgremlins\Gremlindash\Facades\Gremlindash');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('gremlindash');
	}

}