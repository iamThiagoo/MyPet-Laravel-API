<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name'  => 'required|max: 100',
            'breed' => 'required|max: 30',
            'color' => 'max: 30',
            'size'  => 'required',
            'owner' => 'required|max: 100',
            'phone' => 'required|max: 20|unique:pets,phone',
            'email' => 'required|email|max: 150|unique:pets,email'
        ];

        if ($this->method() === 'PATCH') {
            $rules = [
                'name'  => 'sometimes|max: 100',
                'breed' => 'sometimes|max: 30',
                'color' => 'sometimes|max: 30',
                'size'  => 'sometimes',
                'owner' => 'sometimes|max: 100',
                'phone' => "sometimes|max: 20|unique:pets,phone,{$this->id}",
                'email' => "sometimes|email|max: 150|unique:pets,email,{$this->id}"
            ];
        }

        return $rules;
    }
}
