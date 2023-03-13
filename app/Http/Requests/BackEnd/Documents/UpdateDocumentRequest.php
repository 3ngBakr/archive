<?php

namespace App\Http\Requests\BackEnd\Documents;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('edit document');
	}

	public function rules(): array
	{
		return [
			'name'            => ['string', 'required', 'unique:documents,name,' . request()->route('document')->id],
			'description'     => ['string', 'nullable'],
			'dateOfBublish'     => ['string', 'nullable'],
			'numberOfPaper'     => ['string', 'nullable'],
			'file'            => ['file', 'mimes:' . implode(",", config('ryada.file_mimes.downloads'))],
			'documentTypes.*' => ['integer'],
			'documentTypes'   => ['array'],
		];
	}
}
