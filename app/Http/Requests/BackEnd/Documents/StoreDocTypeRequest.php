<?php

namespace App\Http\Requests\BackEnd\Documents;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocTypeRequest extends FormRequest
{
	public function authorize()
	: bool
	{
		return \Auth::user()->can('create document_type');
	}

	public function rules()
	: array
	{
		return [
			'name' => ['string', 'required', 'unique:document_types'],
		];
	}
}
