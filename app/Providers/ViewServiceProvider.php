<?php

namespace App\Providers;

use App\Models\Bage;
use App\Models\Main;
use App\Models\Social;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		
	}
}