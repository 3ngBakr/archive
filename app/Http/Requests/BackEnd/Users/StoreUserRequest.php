<?php

namespace App\Http\Requests\BackEnd\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
	public function authorize()
	: bool
	{
		return \Auth::user()->can('create user');
	}

	public function rules()
	: array
	{
		return [
			'name'     => ['string', 'required'],
			'email'    => ['required', 'unique:users'],
			'password' => ['required'],
			'roles.*'  => ['integer'],
			'roles'    => ['required', 'array'],
		];
	}
}
