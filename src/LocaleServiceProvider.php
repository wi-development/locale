<?php

namespace WI\Locale;


use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class LocaleServiceProvider extends ServiceProvider
{
    
	
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    #protected $defer = true;
	
	/**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

	    if (is_dir(base_path() . '/resources/views/admin/locale')) {
		    //load from resource
		    $this->loadViewsFrom(base_path() . '/resources/views/admin/locale', 'locale');
	    } else {
		    //load from package
		    $this->loadViewsFrom(__DIR__.'/views', 'locale');
	    }

		if (!$this->app->routesAreCached()) {
			$this->setupRoutes($this->app->router);
		}

		config([
			'config/wi/locale.php',
		]);


	    $this->publishes([
		    __DIR__.'/views' => base_path('resources/views/admin/locale'),
		    __DIR__.'/config/locale.php' => config_path('wi/dashboard.php')
	    ],'locale');
    }
	
	/**
		 * Define the routes for the application.
		 *
		 * @param  \Illuminate\Routing\Router  $router
		 * @return void
		 */
		public function setupRoutes(Router $router)
		{

			$router->group([
				//'namespace' => 'WI\Locale',
				'namespace' => 'WI\Locale',	// Controllers Within The "WI\Locale" Namespace
				'as' => 'admin::',		// Route named "admin::
				//'prefix' => 'backStage',	// Matches The "/admin" URL
				'prefix' => config('wi.dashboard.admin_prefix'),
				'middleware' => ['web','auth']	// Use Auth Middleware
			],
				function($router)
				{
					require __DIR__.'/routes.php';
				}
			);

		}

    /**
     * Register the application services.
     * https://laracasts.com/discuss/channels/general-discussion/how-to-move-my-controllers-into-a-seperate-package-folder
     * @return void
     */
    public function register()
    {
        #dd('asdf');
		#include __DIR__.'/routes.php';
		$this->app->make('WI\Locale\LocaleController');

		//$this->app->register(Vendor\Package\Providers\RouteServiceProvider::class);
    }
}
