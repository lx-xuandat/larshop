<?php

namespace App\Http\Requests;

use App\Rules\name;
use App\Rules\price;
use App\Rules\quantity;
use App\Rules\weight;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'code' => 'required|max:8|min:8|unique:products',
            'price' => ['required', new price],
            'weight' => ['required', new weight],
            'quantity' => ['required', new quantity],
            'description' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name khong duoc bo trong',
            'code.required' => 'Ma Code khong duoc bo trong',
            'name.max' => 'Ten qua dai',
            'code.min' => 'Code qua ngan',
            'code.max' => 'Code qua dai',
        ];
    }
}
