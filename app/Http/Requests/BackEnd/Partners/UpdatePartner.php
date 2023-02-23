<?php

namespace App\Http\Requests\BackEnd\Partners;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartner extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('edit partner');
	}

	public function rules(): array
	{
		return [
			'name' => ['string', 'required', 'unique:partners,name,' . request()->route('partner')->id],
			'logo' => ['image', 'max:2048', 'mimes:' . implode(",", config('ryada.file_mimes.models_logo'))],
		];
	}
}