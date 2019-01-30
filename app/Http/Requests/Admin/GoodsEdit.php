<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GoodsEdit extends FormRequest
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
            'name' => 'required',
            'stock' => 'required',
            'company' =>'required',
            'price' => 'required',
            'content' => 'required',

        ];
    }

     public function messages()
    {
        return [
            'name.required' => '请输入用户名',
            'price.required' => '请输入价格',
            'stock.required' => '请输入库存',
            'company.required' => '请输入厂家',
            'content.required' => '请添加内容',        
        ];
    }
}
