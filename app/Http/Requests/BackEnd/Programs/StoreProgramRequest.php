<?php

namespace App\Http\Requests\BackEnd\Programs;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('create program');
	}

	public function rules(): array
	{
		return [
			'name'    => ['string', 'required', 'unique:programs'],
			'content' => ['string', 'required'],
			'cover'   => ['image', 'required', 'max:2048',
			              'mimes:' . implode(",", config('ryada.file_mimes.models_cover'))],
			'logo'    => ['image', 'required', 'max:2048',
			              'mimes:' . implode(",", config('ryada.file_mimes.models_logo'))],
		    'program_id'      => ['nullable', 'integer'],
							];
	}
}
