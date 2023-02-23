<?php

namespace App\Http\Requests\BackEnd\Roles;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
	public function authorize()
	: bool
	{
		return \Auth::user()->can('edit role');
	}

	public function rules()
	: array
	{
		return [
			'name'          => ['string', 'required', 'unique:roles,name,' . request()->route('role')->id],
			'permissions.*' => ['integer'],
			'permissions'   => ['array'],
		];
	}
}
