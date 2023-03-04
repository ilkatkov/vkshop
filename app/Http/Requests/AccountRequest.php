<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone' => 'required|min:11|max:11',
            'name' => 'required|min:1|max:32',
            'surname' => 'required|min:1|max:32',
            'patronymic' => 'required|min:1|max:32',
            'address' => 'required|min:1|max:128',
        ];
    }
}
