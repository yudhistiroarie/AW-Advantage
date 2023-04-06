<?php

namespace App\Actions\Login;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Lorisleiva\Actions\Concerns\AsAction;

class DoLogin {
    use AsAction;

    public function asController(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
