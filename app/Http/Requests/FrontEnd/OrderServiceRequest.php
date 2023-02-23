<?php

namespace App\Http\Requests\FrontEnd;

use Illuminate\Foundation\Http\FormRequest;

class OrderServiceRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'name'           => ['string', 'required', 'max:50'],
			'position'       => ['string', 'required', 'max:30'],
			'email'          => ['string', 'required', 'email', 'max:60'],
			'personal_phone' => ['numeric', 'required', 'digits:9'],
			'company_phone'  => ['numeric', 'required', 'digits:9'],
			'company'        => ['string', 'required', 'max:80'],
			'message'        => ['string', 'required'],
			'services'       => ['required', 'array'],
			'services.*'     => ['integer', 'exists:services,id'],
		];
	}

	public function attributes(): array
	{
		return [
			'services'       => __('Services'),
			'position'       => __('Position'),
			'personal_phone' => __('Personal Phone'),
			'company_phone'  => __('Company Phone'),
		];
	}
}
