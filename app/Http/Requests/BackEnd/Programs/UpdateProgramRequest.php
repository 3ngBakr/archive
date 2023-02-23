<?php

namespace App\Http\Requests\BackEnd\Programs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgramRequest extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('edit program');
	}

	public function rules(): array
	{
		return [
			'name'    => ['string', 'required', 'unique:programs,name,' . request()->route('program')->id],
			'content' => ['string', 'required'],
			'cover'   => ['image', 'max:2048', 'mimes:' . implode(",", config('ryada.file_mimes.models_cover'))],
			'logo'    => ['image', 'max:2048', 'mimes:' . implode(",", config('ryada.file_mimes.models_logo'))],
			'program_id'      => ['nullable', 'integer', 'not_in:' . request()->route('program')->id],
			];
	}

	public function messages(): array
	{
		return [
			'program_id.not_in' => __("Program can't be parent program of has self."),
		];
	}
	
}
