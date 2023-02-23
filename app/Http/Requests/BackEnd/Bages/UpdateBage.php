<?php

namespace App\Http\Requests\BackEnd\Bages;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBage extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('edit bage');
	}

	public function rules(): array
	{
		return [
			'name' => ['string', 'required', 'unique:partners'],
			'description' => ['string', 'required'],
			'vision' => ['string', 'required'],
			'message' => ['string', 'required'],
			'objective' => ['string', 'required'],
			];
	}
}