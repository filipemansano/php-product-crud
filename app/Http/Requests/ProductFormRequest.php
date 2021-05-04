<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductFormRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

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
            'name' => 'required|max:100',
            'quantity' => 'required|integer|min:0',
            'category_id' => [
                'required',
                'exists:category,id',
                'unique' => Rule::unique('product')->ignore(request()->route('id'))->where(function ($query) {
                    return $query->where([
                        'name' => request()->get('name'),
                        'category_id' => request()->get('category_id'),
                    ]);
                })
            ]
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nome',
            'quantity' => 'quantidade',
            'category_id' => 'categoria',
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
            '*.required' => 'O campo :attribute é obrigatório',
            'quantity.integer' => 'quantidade deve ser um numero inteiro',
            'quantity.min' => 'quantidade deve ser um numero maior que 0',
            'category_id.exists' => 'categoria informada não existe',
            'category_id.unique' => 'já existe um nome atribuido a essa categoria',
        ];
    }
}
