<?php

namespace App\Actions\Email;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class DoEmailVerifNotif {
    use AsAction;

    public function asController(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
