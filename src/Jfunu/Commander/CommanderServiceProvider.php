<?php namespace Jfunu\Commander;

use Illuminate\Support\ServiceProvider;

class CommanderServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Jfunu\Commander\CommandTranslator', 'Jfunu\Commander\BasicCommandTranslator');
		$this->app->bindShared('Jfunu\Commander\CommandBus', function(){

			return $this->app->make('Jfunu\Commander\ValidationCommandBus');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('commander');
	}

}
