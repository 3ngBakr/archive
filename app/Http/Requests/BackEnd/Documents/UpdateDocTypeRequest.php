<?php

namespace App\Http\Requests\BackEnd\Documents;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocTypeRequest extends FormRequest
{
	public function authorize()
	: bool
	{
		return \Auth::user()->can('edit document_type');
	}

	public function rules()
	: array
	{
		return [
			'name' => [
				'string',
				'required',
				'unique:document_types,name,' . $this->id,
				
			],
		];
	}
}
