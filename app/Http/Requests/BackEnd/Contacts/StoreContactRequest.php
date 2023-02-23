<?php

namespace App\Http\Requests\BackEnd\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('create contact');
	}

	public function rules(): array
	{
		return [
			'name'    => ['string', 'required'],
			'email'   => ['string', 'required'],
			'phone'   => ['numeric', 'required'],
			'subject' => ['string', 'required'],
			'message' => ['string', 'required'],
			'file'    => ['file', 'max:10240'],
		];
	}
}
