<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function edit(AccountRequest $request) {
        $user = User::find(auth()->user()->id);
        $user->update($request->validated());
        $user->save();

        return redirect(route('account'));
    }
}
