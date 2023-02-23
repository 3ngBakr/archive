<?php

namespace App\Http\Requests\BackEnd\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
	public function authorize()
	: bool
	{
		return \Auth::user()->can('edit user');
	}

	public function rules()
	: array
	{
		return [
			'name'    => ['string', 'required'],
			'email'   => ['required', 'unique:users,email,' . request()->route('user')->id],
			'roles.*' => ['integer'],
			'roles'   => ['required', 'array'],
		];
	}
}
