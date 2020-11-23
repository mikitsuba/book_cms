<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksFormRequest extends FormRequest
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
            'item_name' => 'required|min:3|max:255',
            'item_number' => 'required|numeric|min:1|max:10000',
            'item_amount' => 'required|numeric|min:0|max:999999',
            'published' => 'required|date',
        ];
    }
}
