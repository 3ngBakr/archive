<?php

namespace App\Http\Requests\BackEnd\Socials;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocial extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('create social');
	}

	public function rules(): array
	{
		return [
			'facebook' => ['string', 'required', 'unique:partners'],
			'twitter' => ['string', 'required'],
			'whatsapp' => ['string', 'required'],
			'instagram' => ['string', 'required'],
			'telegram' => ['string', 'required'],
			];
	}
}
