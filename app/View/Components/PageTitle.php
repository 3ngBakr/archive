<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageTitle extends Component
{
	public string  $title;
	public array   $breadcrumbs;
	public ?string $imageUrl;

	public function __construct(string $title, array $breadcrumbs, ?string $imageUrl = null)
	{
		$this->title       = $title;
		$this->breadcrumbs = $breadcrumbs;
		$this->imageUrl    = $imageUrl;
	}

	public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Support\Htmlable|\Closure|string|\Illuminate\Contracts\Foundation\Application
	{
		return view('components.page-title');
	}
}
