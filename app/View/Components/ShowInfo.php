<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ShowInfo extends Component
{
	public string  $title;
	public string  $value;
	public string  $type;
	public ?string $modelName;

	public function __construct(string $title, string $value, string $type = 'text', ?string $modelName = '')
	{
		$this->title     = $title;
		$this->value     = $value;
		$this->type      = $type;
		$this->modelName = $modelName;
	}

	public function render(): \Illuminate\Contracts\View\View
	{
		return view('components.show-info');
	}
}
