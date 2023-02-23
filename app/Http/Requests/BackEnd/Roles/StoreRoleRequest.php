<?php

namespace App\Http\Requests\BackEnd\Roles;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
	public function authorize()
	: bool
	{
		return \Auth::user()->can('create role');
	}

	public function rules()
	: array
	{
		return [
			'name'          => ['string', 'required', 'unique:roles'],
			'permissions.*' => ['integer'],
			'permissions'   => ['array'],
		];
	}
}
