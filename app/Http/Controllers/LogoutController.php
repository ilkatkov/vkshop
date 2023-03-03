<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LogoutController extends Controller
{
    /**
     * Выход из аккаунта
     *
     * @return Redirector
     */
    public function perform()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
