<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PagesController extends FrontEndController
{
	public function index(): Factory|View|Application
	{
		$posts      = Blog::latest()->limit(3)->get();
		$news = Blog::where('type','NE')->latest()->limit(3)->get();
		$article = Blog::where('type','AC')->latest()->limit(3)->get();
		$chServices = Service::whereHas('parentService')->get();

		return view('front-end.home', compact('posts', 'chServices', 'news', 'article'))->with(['title' => __('Home')]);
	}

	public function bage(): Factory|View|Application
	{
		$breadcrumbs = array(
			['route' => route('bage'), 'text' => 'Bage']
		);

		return view('front-end.bage', compact('breadcrumbs'))->with(['title' => __('Bage')]);
	}

	public function programs(): Factory|View|Application
	{
		return view('front-end.programs.show')->with(['title' => __('Program')]);
	}
}
