<?php

namespace App\Http\Requests\BackEnd\Services;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('edit service');
	}

	public function rules(): array
	{
		return [
			'name'            => ['string', 'required', 'unique:services,name,' . request()->route('service')->id
			                     ],
			'content'         => ['nullable', 'string'],
			'description'     => ['nullable', 'string'],
			'logo'    => ['image', 'max:2048', 'mimes:' . implode(",", config('ryada.file_mimes.models_logo'))],
			'order_all_child' => ['required', 'boolean'],
			'service_id'      => ['nullable', 'integer', 'not_in:' . request()->route('service')->id],
				];
	}

	public function messages(): array
	{
		return [
			'service_id.not_in' => __("Service can't be parent service of has self."),
		];
	}
}
