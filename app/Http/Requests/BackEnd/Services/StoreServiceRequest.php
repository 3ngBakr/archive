<?php

namespace App\Http\Requests\BackEnd\Services;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('create service');
	}

	public function rules(): array
	{
		return [
			'name'            => ['string', 'required', 'unique:services'],
			'content'         => ['string', 'required'],
			'description'     => ['nullable', 'string' ],
			'order_all_child' => ['required', 'boolean'],
			'service_id'      => ['nullable', 'integer'],
			'logo'    => ['image', 'required', 'max:2048',
			'mimes:' . implode(",", config('ryada.file_mimes.models_logo'))],

			
		];
	}
}
