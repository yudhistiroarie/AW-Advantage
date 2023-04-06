<?php

namespace App\Actions\Password;

use Lorisleiva\Actions\Concerns\AsAction;

class ShowForgetPass {
    use AsAction;

    public function asController() {
        return view('auth.forgot-password');
    }
}
