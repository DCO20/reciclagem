<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEmployee extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'min:3', 'max:255', "unique:employees,email,{$id},id"],
            'zipcode' => ['required','min:8','max:9'],
            'street' => ['required'],
            'number' => ['required'],
            'neighborhood' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'cell' => ['required'],
            
        ];

        return $rules;
    }
}
