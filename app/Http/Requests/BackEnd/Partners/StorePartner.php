<?php

namespace App\Http\Requests\BackEnd\Partners;

use Illuminate\Foundation\Http\FormRequest;

class StorePartner extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('create partner');
	}

	public function rules(): array
	{
		return [
			'name' => ['string', 'required', 'unique:partners'],
			'logo' => ['image', 'required', 'max:2048',
			           'mimes:' . implode(",", config('ryada.file_mimes.models_logo'))],
		];
	}
}
