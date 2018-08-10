<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_pt' => 'required',
            'name_en' => 'required',
            'name_cn' => 'required',
            'position' => 'required|integer|max:15|min:1',
            'link' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name_pt.required' => 'campo obrigatório!',
            'name_en.required' => 'campo obrigatório!',
            'name_cn.required' => 'campo obrigatório!',
            'position.required' => 'campo obrigatório!',
            'position.integer' => 'valor deve ser numérico!',
            'position.max' => 'valor deve ser inferior à 16!',
            'position.min' => 'valor deve ser superior à 0!',
            'link.required' => 'campo obrigatório!'
        ];
    }
}
