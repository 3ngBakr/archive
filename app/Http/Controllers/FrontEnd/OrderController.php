<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Requests\FrontEnd\OrderServiceRequest;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class OrderController extends FrontEndController
{
	public function create(Service $service): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
	{
		$ordealServices = Cache::get('services');

		if ($service->canOrderAllChild()) {
			$ordealServices = $ordealServices->where('id', $service->id);
		}

		return view('front-end.order', compact('service', 'ordealServices'))->with('title', __('Order A Service'));
	}

	public function store(OrderServiceRequest $request): \Illuminate\Http\RedirectResponse
	{
		$order = Order::create($request->validated());
		$order->services()->sync($request->input('services'));

		return back()->with('success', __('Service has been ordered, we will contact you soon.'));
	}
}
