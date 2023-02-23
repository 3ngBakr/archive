<?php

namespace App\Http\Requests\BackEnd\Permissions;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
{
	public function authorize()
	: bool
	{
		return true;
	}

	public function rules()
	: array
	{
		return [
			// // 'name'    => ['string', 'required', 'unique:permissions', 'max:125'],
			// // 'roles.*' => ['integer'],
			// // 'roles'   => ['array'],
			// 'name'       => ['string', 'required'],
			// 'group'      => ['required']  ,
			// 'tab'        => ['required']  ,
			// // 'guard_name' => "web",
		
			
		];
	}
}
