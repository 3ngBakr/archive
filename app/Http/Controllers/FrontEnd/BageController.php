<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Bage;
use App\Models\Main;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class BageController extends FrontEndController
{
	public function index(): Factory|View|Application
	{
	
		$bages = Bage::paginate(8);
		$title = __('Bage');

		$breadcrumbs = array(
			['route' => route('bages.index'), 'text' => 'Bage']
		);

		return view('front-end.bages.index', compact('title', 'bages', 'breadcrumbs'));
	}

	
}
