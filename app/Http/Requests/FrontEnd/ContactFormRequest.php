<?php

namespace App\Http\Requests\FrontEnd;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'name'    => ['string', 'required', 'max:50'],
			'email'   => ['string', 'required', 'max:60'],
			'phone'   => ['numeric', 'required', 'digits:9'],
			'subject' => ['string', 'required', 'max:80'],
			'message' => ['string', 'required'],
			'file'    => ['file', 'max:10240']
		];
	}
}
