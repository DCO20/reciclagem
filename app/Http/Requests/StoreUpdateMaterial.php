<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMaterial extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255', "unique:materials,name,{$id},id"],
            'volume' => ['required'],
            'point' => ['required'],
            'shelf_life' => ['required'],
        ];

        return $rules;
    }
}
