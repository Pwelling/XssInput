<?php namespace Pwelling\XssInput;

use Illuminate\Support\ServiceProvider;

class XssInputServiceProvider extends ServiceProvider
{
	/**
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * @return void
	 */
	public function boot()
	{
	}

	/**
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * @return array
	 */
	public function provides()
	{
		return [];
	}
}
