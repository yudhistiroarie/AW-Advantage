<?php

namespace App\Actions\Email;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class EmailVerifPrompt {
    use AsAction;

    public function handle(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('auth.verify-email');
    }
}
