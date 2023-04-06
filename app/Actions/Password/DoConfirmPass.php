<?php

namespace App\Actions\Password;

use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class DoConfirmPass {
    use AsAction;

    public function asController(Request $request)
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
