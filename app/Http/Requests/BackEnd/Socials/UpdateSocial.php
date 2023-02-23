<?php

namespace App\Http\Requests\BackEnd\Socials;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSocial extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('edit social');
	}

	public function rules(): array
	{
		return [
			'facebook' => ['string', 'required'],
			'twitter' => ['string', 'required'],
			'whatsapp' => ['string', 'required'],
			'instagram' => ['string', 'required'],
			'telegram' => ['string', 'required'],
			];
	}
}