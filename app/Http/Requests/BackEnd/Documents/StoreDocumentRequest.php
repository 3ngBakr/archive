<?php

namespace App\Http\Requests\BackEnd\Documents;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('create document');
	}

	public function rules(): array
	{
		return [
			'name'            => ['string', 'required', 'unique:documents'],
			'description'     => ['string', 'nullable'],
			'file'            => ['file', 'required', 'mimes:' . implode(",", config('ryada.file_mimes.downloads'))],
			'documentTypes.*' => ['integer'],
			'documentTypes'   => ['array'],
			'sender'          => ['string', 'nullable'],
			'reciver'          => ['string', 'nullable'],
		];
	}
}
