<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'login' => 'required|unique:users,login',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'phone' => 'required|min:11|max:11',
            'name' => 'required|min:1|max:32',
            'surname' => 'required|min:1|max:32',
            'patronymic' => 'required|min:1|max:32',
            'address' => 'required|min:1|max:128',
            'password' => 'required|min:1|max:32',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
