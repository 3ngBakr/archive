<?php

namespace App\Http\Requests\BackEnd\Permissions;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
{
	public function authorize()
	: bool
	{
		return \Auth::user()->can('edit permission');
	}

	public function rules()
	: array
	{
		return [];
	}
}
