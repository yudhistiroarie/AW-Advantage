<?php

namespace App\Actions\Password;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Lorisleiva\Actions\Concerns\AsAction;

class DoForgetPass {
    use AsAction;

    public function asController(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
