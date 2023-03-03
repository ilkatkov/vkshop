<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /**
     * Отображение страницы регистрации
     *
     * @return Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Обработчик регистрации пользователя
     *
     * @param RegisterRequest $request
     * @return Response
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        auth()->login($user);

        return redirect('/')->with('success', "Вы зарегистрированы!");
    }
}
