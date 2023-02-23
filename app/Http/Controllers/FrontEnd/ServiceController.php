<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ServiceController extends FrontEndController
{
	public function index(): Factory|View|Application
	{
		$breadcrumbs = array(
			['route' => route('services.index'), 'text' => 'Services'],
		);

		return view('front-end.services.index', compact('breadcrumbs'))->with('title', __('Services'));
	}

	public function show(Service $service): Factory|View|Application
	{
		$chServices = Service::whereHas('parentService')->get();
		$breadcrumbs = array(
			// ['route' => route('services.index'), 'text' => 'Services'],
			['route' => route('services.show', $service->id), 'text' => "خدماتنا"],
		);

		return view('front-end.services.show', compact('chServices','service', 'breadcrumbs'))->with('title', "خدماتنا");


		
	}
}
