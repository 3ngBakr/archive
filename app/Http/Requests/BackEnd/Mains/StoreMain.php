<?php

namespace App\Http\Requests\BackEnd\Mains;

use Illuminate\Foundation\Http\FormRequest;

class StoreMain extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->can('create main');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'            => ['string', 'required'],
            'description'     => ['nullable', 'string'],
            'image'    => ['image', 'required', 'max:2048',
			'mimes:' . implode(",", config('ryada.file_mimes.models_image'))],
            //
            
        ];
    }
}
