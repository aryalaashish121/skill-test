<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'price'=>['required','numeric','min:1'],
            'category_id'=>['required','exists:categories,id'],
            'image'=>['nullable','file','mimes:png,jpg'],
            'in_stock'=>['required','boolean'],
        ];
    }
}
