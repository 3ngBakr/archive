<?php

namespace App\Http\Requests\BackEnd\Blogs;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlog extends FormRequest
{
	public function authorize(): bool
	{
		return \Auth::user()->can('create blog');
	}

	public function rules(): array
	{
		return [
			'title'   => ['string', 'required', 'unique:blogs'],
			'content' => ['string', 'required'],
			'type'    => ['string', 'required', 'max:4',
			              'in:' . implode(',', array_keys(config("ryada.our_blogs_types")))],
		    'image'   => ['image', 'required', 'max:2048',
			              'mimes:' . implode(",", config('ryada.file_mimes.models_image'))],
		];
	}
}