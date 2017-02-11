<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class product_request extends FormRequest
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
            'sltParent'=>'required',
            'txtName'=>'required|unique:products,name',
            'fImages'=>'required|image'
        ];
    }


    public function messages(){
        return[
        'sltParent.required'=>'please choose category',
        'txtName.required'=>'please enter name product',
        'txtName.unique'=>'product name is exit',
            'fImages.required'=>'please choose image',
            'fImages.image'=>'this fife image'
            ];
    }
}
