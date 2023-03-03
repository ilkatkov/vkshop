<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'login' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @return array
     * @throws BindingResolutionException
     */
    public function getCredentials()
    {
        // The form field for providing username or password
        // have name of "login", however, in order to support
        // logging users in with both (login and email)
        // we have to check if user has entered one or another
        $login = $this->get('login');

        if ($this->isEmail($login)) {
            return [
                'email' => $login,
                'password' => $this->get('password')
            ];
        }

        return $this->only('login', 'password');
    }

    /**
     * Проверяем, что пользователь ввел email в авторизации
     *
     * @param $param
     * @return bool
     * @throws BindingResolutionException
     */
    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['login' => $param],
            ['login' => 'email']
        )->fails();
    }
}
