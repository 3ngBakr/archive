<?php

namespace App\Http\Requests\BackEnd\Bages;

use Illuminate\Foundation\Http\FormRequest;

class StoreBage extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('create bage');
	}

	public function rules(): array
	{
		return [
		
			
		];
	}
}
